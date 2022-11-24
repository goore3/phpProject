<?php

namespace app\services;

use Exception;
use UnexpectedValueException;

class UploaderService
{

    /**
     * Constantes para Uploader
     */
    // Caminho onde os ficheiros enviados vao ser alojados no servidor
    const UPLOAD_DIR = SERVER_PATH.'/uploads/';
    const UPLOAD_DIR_ACCESS_MODE = 0777;
    // Tamanho máximo em Bytes dos ficheiros enviados
    const UPLOAD_MAX_FILE_SIZE = 10485760;
    // Tipo de ficheiros permitidos.
    const UPLOAD_ALLOWED_MIME_TYPES = [
        'image/jpeg',
        'image/png',
        'image/gif',
    ];

    public function __construct()
    {
    }

    /**
     * Método para fazer Upload de ficheiros
     *
     * @param array $files (Opcional) Lista/Array de Ficheiros.
     * @return bool|string[] TRUE no caso de sucesso, se não retorna uma lista de erros.
     */
    public function upload(array $files = [])
    {
        // Normalizar os ficheiros
        $normalizedFiles = $this->normalizeFiles($files);

        // Upload de cada ficheiro
        foreach ($normalizedFiles as $normalizedFile) {
            $uploadResult = $this->uploadFile($normalizedFile);

            if ($uploadResult !== TRUE) {
                $errors[] = $uploadResult;
            }
        }

        // TRUE no caso de sucesso, se não retorna uma lista de erros
        return empty($errors) ? TRUE : $errors;
    }

    /**
     * Normalizar os ficheiros
     *
     * @link https://www.php-fig.org/psr/psr-7/#16-uploaded-files
     *
     * @param array $files (Opcional) Lista/Array de Ficheiros.
     * @return array Lista de ficheiros Normalizados, organizados.
     */
    private function normalizeFiles(array $files = [])
    {
        $normalizedFiles = [];

        foreach ($files as $filesKey => $filesItem) {
            foreach ($filesItem as $itemKey => $itemValue) {
                $normalizedFiles[$itemKey][$filesKey] = $itemValue;
            }
        }

        return $normalizedFiles;
    }

    /**
     * Upload de um Ficheiro
     *
     * @param array $file (Opcional) Um Ficheiro
     * @return bool|string No caso de succeso True, no caso de falha, um erro em string
     */
    public function uploadFile(array $file = [])
    {
        $name = $file['name'];
        $type = $file['type'];
        $tmpName = $file['tmp_name'];
        $error = $file['error'];
        $size = $file['size'];

        /*
         * Validação do Ficheiro. O upload so acontece quando o UPLOAD_ERR_OK TRUE
         *
         * @link https://secure.php.net/manual/en/features.file-upload.errors.php
         */
        switch ($error) {
            case UPLOAD_ERR_OK: // Sem erros
                // Valida o tamanho do ficheiro.
                if ($size > self::UPLOAD_MAX_FILE_SIZE) {
                    return sprintf('O tamanho do arquivo "%s" excede o tamanho máximo permitido (%s Byte).'
                        , $name
                        , self::UPLOAD_MAX_FILE_SIZE
                    );
                }

                // Validar o tipo do ficheiro
                if (!in_array($type, self::UPLOAD_ALLOWED_MIME_TYPES)) {
                    return sprintf('O arquivo "%s" não é de um tipo MIME válido. Tipos MIME permitidos:%s.'
                        , $name
                        , implode(', ', self::UPLOAD_ALLOWED_MIME_TYPES)
                    );
                }

                // Usar o caminho da constante definida no inicio.
                $uploadDirPath = rtrim(self::UPLOAD_DIR, '/');
                $uploadPath = $uploadDirPath . '/' . $name;

                // Criar a pasta de uploads
                $this->createDirectory($uploadDirPath);

                // Mover o ficheiro para a pasta de uploads
                if (!move_uploaded_file($tmpName, $uploadPath)) {
                    return sprintf('O arquivo "%s" não pôde ser movido para o local especificado.'
                        , $name
                    );
                }

                return TRUE;

                break;

            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return sprintf('O arquivo fornecido "%s" excede o tamanho de arquivo permitido.'
                    , $name
                );
                break;

            case UPLOAD_ERR_PARTIAL:
                return sprintf('O arquivo fornecido "%s" foi carregado apenas parcialmente.'
                    , $name
                );
                break;

            case UPLOAD_ERR_NO_FILE:
                return 'Nenhum arquivo fornecido. Selecione pelo menos um arquivo.';
                break;

            default:
                return 'Ocorreu um problema com o upload. Por favor, tente novamente.';
                break;
        }

        return TRUE;
    }

    /**
     * Criar uma diretoria no caminho especificado, e se possivel.
     *
     * @param string $path O caminho onde a pasta deverá ser criada.
     * @return $this
     */
    private function createDirectory($path)
    {
        try {
            if (file_exists($path) && !is_dir($path)) {
                throw new UnexpectedValueException(
                    'O diretório de upload não pode ser criado porque já existe um arquivo com o mesmo nome!'
                );
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
            exit();
        }

        if (!is_dir($path)) {
            mkdir($path, self::UPLOAD_DIR_ACCESS_MODE, TRUE);
        }

        return $this;
    }

    static public function listFilesInPath($path = './')
    {
        $files = scandir($path);
        $files = array_diff(scandir($path), array('.', '..'));
        return $files;
    }

}
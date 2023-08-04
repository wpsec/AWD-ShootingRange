<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 废墟 <r.anerg@gmail.com> <http://anerg.com>
// +----------------------------------------------------------------------

namespace Think\Upload\Driver;

spl_autoload_register(function($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . DIRECTORY_SEPARATOR .'Oss'. DIRECTORY_SEPARATOR . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
use OSS\OssClient;
use OSS\Core\OssException;

class Oss
{
    /**
     * 上传文件根目录
     * @var string
     */
    private $rootPath;

    /**
     * 上传错误信息
     * @var string
     */
    private $error = '';
    private $config = array(
        'access_id' => '', //阿里云Access Key ID
        'access_key' => '', //阿里云Access Key Secret
        'bucket' => '', //空间名称
        'timeout' => 90, //超时时间
    );

    /**
     * 构造函数，用于设置上传根路径
     * @param array $config FTP配置
     */
    public function __construct($root, $config)
    {

        /* 默认FTP配置 */
        $this->config = array_merge($this->config, $config);
        $this->rootPath = trim($root, './') . '/';
    }

    /**
     * 检测上传根目录(阿里云上传时支持自动创建目录，直接返回)
     * @param string $rootpath 根目录
     * @return boolean true-检测通过，false-检测失败
     */
    public function checkRootPath($rootpath)
    {
        /* 设置根目录 */
        $this->rootPath = trim($rootpath, './') . '/';
        return true;
    }

    /**
     * 检测上传目录(阿里云上传时支持自动创建目录，直接返回)
     * @param  string $savepath 上传目录
     * @return boolean          检测结果，true-通过，false-失败
     */
    public function checkSavePath($savepath)
    {
        return true;
    }

    /**
     * 创建文件夹 (阿里云上传时支持自动创建目录，直接返回)
     * @param  string $savepath 目录名称
     * @return boolean          true-创建成功，false-创建失败
     */
    public function mkdir($savepath)
    {
        return true;
    }

    /**
     * 保存指定文件
     * @param  array $file 保存的文件信息
     * @param  boolean $replace 同名文件是否覆盖
     * @return boolean          保存状态，true-成功，false-失败
     */
    public function save(&$file, $replace = true)
    {
        $endPoint = 'http://'.$this->config['oss_host'].'.aliyuncs.com';
        try {
            $ossClient = new OssClient($this->config['access_id'], $this->config['access_key'], $endPoint, false);
        } catch (OssException $e) {
            $this->error = 'Oss Create Error!';
            return false;
        }

        $path = trim($file['rootPath'], '.') . $file['savepath'] . $file['savename'];
        $imageExts = array('png', 'jpg', 'gif', 'jpeg');
        $host2 = in_array(strtolower($file['ext']), $imageExts) ? str_replace('oss-cn-', 'img-cn-', $this->config['bind_host']) : $this->config['bind_host'];
        $file['url'] = 'http://' . $host2 . $path;
        try {
            $result = $ossClient->uploadFile($this->config['bucket'], trim($path,'/'), $file['tmp_name']);
        } catch (OssException $e) {
            $this->error = 'Oss Upload File Error!';
            return false;
        }

        if ($result['info']['http_code'] == 200) {
            return true;
        } else {
            $this->error = 'Oss Upload Unknow Error!';
            return false;
        }
    }

    /**
     * 获取最后一次上传错误信息
     * @return string 错误信息
     */
    public function getError()
    {
        return $this->error;
    }


    private function hex_to_base64($str)
    {
        $result = '';

        for ($i = 0; $i < strlen($str); $i += 2) {
            $result .= chr(hexdec(substr($str, $i, 2)));
        }

        return base64_encode($result);
    }

    public function info($fname)
    {
        return true;
    }
}
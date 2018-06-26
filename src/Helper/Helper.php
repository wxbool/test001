<?php
namespace Tengxunai\Helper;

class Helper {

    /**
     * UTF-8编码 GBK编码相互转换/（支持数组）
     *
     * @param array/string  $str          字符串，支持数组传递
     * @param string $in_charset   原字符串编码
     * @param string $out_charset  输出的字符串编码
     * @return array/string
     */
    public static function arrayIconv($str, $in_charset="gbk", $out_charset="utf-8") {
        if(is_array($str)) {
            foreach($str as $k => $v) {
                $str[$k] = self::arrayIconv($v , $in_charset , $out_charset);
            }
            return $str;
        } else {
            if(is_string($str)) {
                return iconv($in_charset, $out_charset, $str);
            } else {
                return $str;
            }
        }
    }


    /**
     * 快速获取文件Base64编码数据
     * @param string $path
     * @return null|string
     */
    public static function fileBase64Str($path='')
    {
        if (empty($path) || !is_file($path)) return null;
        //返回
        return base64_encode( file_get_contents($path) );
    }
}
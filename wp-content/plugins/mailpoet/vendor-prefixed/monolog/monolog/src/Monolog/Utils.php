<?php
namespace MailPoetVendor\Monolog;
if (!defined('ABSPATH')) exit;
class Utils
{
 public static function getClass($object)
 {
 $class = \get_class($object);
 return 'c' === $class[0] && 0 === \strpos($class, "class@anonymous\x00") ? \get_parent_class($class) . '@anonymous' : $class;
 }
 public static function canonicalizePath($streamUrl)
 {
 $prefix = '';
 if ('file://' === \substr($streamUrl, 0, 7)) {
 $streamUrl = \substr($streamUrl, 7);
 $prefix = 'file://';
 }
 // other type of stream, not supported
 if (\false !== \strpos($streamUrl, '://')) {
 return $streamUrl;
 }
 // already absolute
 if (\substr($streamUrl, 0, 1) === '/' || \substr($streamUrl, 1, 1) === ':' || \substr($streamUrl, 0, 2) === '\\\\') {
 return $prefix . $streamUrl;
 }
 $streamUrl = \getcwd() . '/' . $streamUrl;
 return $prefix . $streamUrl;
 }
 public static function jsonEncode($data, $encodeFlags = null, $ignoreErrors = \false)
 {
 if (null === $encodeFlags && \version_compare(\PHP_VERSION, '5.4.0', '>=')) {
 $encodeFlags = \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE;
 }
 if ($ignoreErrors) {
 $json = @\json_encode($data, $encodeFlags);
 if (\false === $json) {
 return 'null';
 }
 return $json;
 }
 $json = \json_encode($data, $encodeFlags);
 if (\false === $json) {
 $json = self::handleJsonError(\json_last_error(), $data);
 }
 return $json;
 }
 public static function handleJsonError($code, $data, $encodeFlags = null)
 {
 if ($code !== \JSON_ERROR_UTF8) {
 self::throwEncodeError($code, $data);
 }
 if (\is_string($data)) {
 self::detectAndCleanUtf8($data);
 } elseif (\is_array($data)) {
 \array_walk_recursive($data, array('Monolog\\Utils', 'detectAndCleanUtf8'));
 } else {
 self::throwEncodeError($code, $data);
 }
 if (null === $encodeFlags && \version_compare(\PHP_VERSION, '5.4.0', '>=')) {
 $encodeFlags = \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE;
 }
 $json = \json_encode($data, $encodeFlags);
 if ($json === \false) {
 self::throwEncodeError(\json_last_error(), $data);
 }
 return $json;
 }
 private static function throwEncodeError($code, $data)
 {
 switch ($code) {
 case \JSON_ERROR_DEPTH:
 $msg = 'Maximum stack depth exceeded';
 break;
 case \JSON_ERROR_STATE_MISMATCH:
 $msg = 'Underflow or the modes mismatch';
 break;
 case \JSON_ERROR_CTRL_CHAR:
 $msg = 'Unexpected control character found';
 break;
 case \JSON_ERROR_UTF8:
 $msg = 'Malformed UTF-8 characters, possibly incorrectly encoded';
 break;
 default:
 $msg = 'Unknown error';
 }
 throw new \RuntimeException('JSON encoding failed: ' . $msg . '. Encoding: ' . \var_export($data, \true));
 }
 public static function detectAndCleanUtf8(&$data)
 {
 if (\is_string($data) && !\preg_match('//u', $data)) {
 $data = \preg_replace_callback('/[\\x80-\\xFF]+/', function ($m) {
 return \utf8_encode($m[0]);
 }, $data);
 $data = \str_replace(array('¤', '¦', '¨', '´', '¸', '¼', '½', '¾'), array('€', 'Š', 'š', 'Ž', 'ž', 'Œ', 'œ', 'Ÿ'), $data);
 }
 }
}

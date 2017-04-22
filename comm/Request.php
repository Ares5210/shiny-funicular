<?php
/**
 * Created by PhpStorm.
 * User: 张文杰
 * Date: 2017/4/22
 * Time: 19:06
 */

namespace comm;

class Request
{

    private $params = null;
    private $method = null;

    /**
     * @param null $key
     * @param null $default
     * @return mixed|null
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public function get($key = null, $default = null)
    {
        $this->method = 'get';
        if ($key == null) {
            return $this->getParams();
        } else {
            return $this->getParam($key, $default);
        }
    }

    /**
     * post提交方式需要防 csrf 攻击，本地项目，太懒，随便写写吧
     * @param null $key
     * @param null $default
     * @return mixed|null
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public function post($key = null, $default = null)
    {
        $this->method = 'post';
        if ($key == null) {
            return $this->getParams();
        } else {
            return $this->getParam($key, $default);
        }
    }

    /**
     * @return null
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public function getParams()
    {
        if ($this->params == null) {
            if ($this->method == 'post') {
                $this->params = $_POST;
            } else {
                $this->params = $_GET;
            }
        }

        return $this->params;
    }

    /**
     * @param $key
     * @param $default
     * @return mixed
     * @author     wenjie.zhang <wenjie.zhang@raiing.com>
     * @createDate 2017/04/22
     */
    public function getParam($key, $default){
        $params = $this->getParams();

        return isset($params[$key]) ? $params[$key] : $default;
    }
}

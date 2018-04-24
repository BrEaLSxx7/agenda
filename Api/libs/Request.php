<?php

class Request
{
    private $get = [];
    private $post = [];
    private $put = [];
    private $delete = [];

    /**
     * @return mixed
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @param mixed $get
     */
    public function setGet($get): void
    {
        $this->get = $get;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post): void
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getPut()
    {
        return $this->put;
    }

    /**
     * @param mixed $put
     */
    public function setPut($put): void
    {
        $this->put = $put;
    }

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param mixed $delete
     */
    public function setDelete($delete): void
    {
        $this->delete = $delete;
    }

    function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->setGet($_REQUEST);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->setPost($_REQUEST);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $this->setPut($_REQUEST);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->setDelete($_REQUEST);
        }
    }
}
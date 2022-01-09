<?php

declare(strict_types=1);
namespace App\Models;
use App\Core\Model;


class comment extends Model
{
    protected $ID;
    protected $ID_final_article;
    protected ?string $username;
    protected ?string $content;
    protected ?string $date;

    /**
     * @param $ID_final_article
     * @param string|null $username
     * @param string|null $content
     * @param string|null $date
     */
    public function __construct($ID_final_article= null,?string $username= null,?string $content= null,?string $date= null)
    {
        $this->ID_final_article = $ID_final_article;
        $this->username = $username;
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getIDFinalArticle()
    {
        return $this->ID_final_article;
    }

    /**
     * @param mixed $ID_final_article
     */
    public function setIDFinalArticle($ID_final_article): void
    {
        $this->ID_final_article = $ID_final_article;
    }


    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }


    static public function setDbColumns()
    {
        return ['ID', 'ID_final_article', 'username', 'content', 'date'];
    }

    static public function setTableName()
    {
        return 'comments';
    }
}


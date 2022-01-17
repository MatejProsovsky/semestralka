<?php

declare(strict_types=1);
namespace App\Models;
use App\Core\Model;


class articles extends final_articles
{
    protected $is_published;

    public function __construct($ID_user= null, ?string $title = null,?string $summary= null,?string $section_1= null,  ?string $source= null, ?string $image= null, ?string $section_2 = null, ?string $section_3 = null, ?string $section_4 = null, ?string $section_5 = null,?string $division = null)
    {
        $this->ID_user = $ID_user;
        $this->title = $title;
        $this->image = $image;
        $this->summary = $summary;
        $this->section_1 = $section_1;
        $this->section_2 = $section_2;
        $this->section_3 = $section_3;
        $this->section_4 = $section_4;
        $this->section_5 = $section_5;
        $this->source = $source;
        $this->division = $division;
        $is_published = 0;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished): void
    {
        $this->is_published = $isPublished;
    }




    static public function setDbColumns()
    {
        return ['ID','ID_user', 'title', 'image', 'summary','section_1','section_2',
            'section_3','section_4','section_5','source','division','is_published'];
    }

    static public function setTableName()
    {
        return 'articles';
    }
}
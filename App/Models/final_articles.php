<?php

declare(strict_types=1);
namespace App\Models;
use App\Core\Model;


class final_articles extends Model
{
    protected $ID;
    protected $ID_user;
    protected ?string $title;
    protected ?string $image;
    protected ?string $summary;
    protected ?string $section_1;
    protected ?string $section_2;
    protected ?string $section_3;
    protected ?string $section_4;
    protected ?string $section_5;
    protected ?string $source;
    protected ?string $division;

    /**
     * @param $ID_user
     * @param string|null $title
     * @param string|null $image
     * @param string|null $summary
     * @param string|null $section_1
     * @param string|null $section_2
     * @param string|null $section_3
     * @param string|null $section_4
     * @param string|null $section_5
     * @param string|null $source
     */
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
    }
    /**
     * @return mixed
     */
    public function getIDUser()
    {
        return $this->ID_user;
    }

    /**
     * @param mixed $ID_user
     */
    public function setIDUser($ID_user): void
    {
        $this->ID_user = $ID_user;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string|null $summary
     */
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return string|null
     */
    public function getSection1(): ?string
    {
        return $this->section_1;
    }

    /**
     * @param string|null $section_1
     */
    public function setSection1(?string $section_1): void
    {
        $this->section_1 = $section_1;
    }

    /**
     * @return string|null
     */
    public function getSection2(): ?string
    {
        return $this->section_2;
    }

    /**
     * @param string|null $section_2
     */
    public function setSection2(?string $section_2): void
    {
        $this->section_2 = $section_2;
    }

    /**
     * @return string|null
     */
    public function getSection3(): ?string
    {
        return $this->section_3;
    }

    /**
     * @param string|null $section_3
     */
    public function setSection3(?string $section_3): void
    {
        $this->section_3 = $section_3;
    }

    /**
     * @return string|null
     */
    public function getSection4(): ?string
    {
        return $this->section_4;
    }

    /**
     * @param string|null $section_4
     */
    public function setSection4(?string $section_4): void
    {
        $this->section_4 = $section_4;
    }

    /**
     * @return string|null
     */
    public function getSection5(): ?string
    {
        return $this->section_5;
    }

    /**
     * @param string|null $section_5
     */
    public function setSection5(?string $section_5): void
    {
        $this->section_5 = $section_5;
    }

    /**
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string|null $source
     */
    public function setSource(?string $source): void
    {
        $this->source = $source;
    }


    static public function setDbColumns()
    {
        return ['ID','ID_user', 'title', 'image', 'summary','section_1','section_2',
            'section_3','section_4','section_5','source','division'];
    }

    static public function setTableName()
    {
        return 'final_articles';
    }

    /**
     * @return string|null
     */
    public function getDivision(): ?string
    {
        return $this->division;
    }

    /**
     * @param string|null $division
     */
    public function setDivision(?string $division): void
    {
        $this->division = $division;
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
}


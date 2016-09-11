<?php

namespace App\Http\Controllers\Traits;


trait LayoutResolver
{
    private $viewAttributes = [];

    public function __construct()
    {
        $this->viewAttributes['page'] = [
            'title' => null,
            'name' => null,
        ];

        $this->updatePageAttributes();
    }

    public function updatePageAttributes()
    {
        if (!empty($this->title)) {
            $this->viewAttributes['page']['title'] = $this->title;
        }

        if (!empty($this->page)) {
            $this->viewAttributes['page']['name'] = $this->page;
        }
    }

    public function getVar($variable)
    {
        if (array_key_exists($variable, $this->viewAttributes)) {
            return $this->viewAttributes[$variable];
        } else {
            return null;
        }
    }

    public function addVar($variable, $content)
    {
        $this->viewAttributes[$variable] = $content;
    }

    public function removeVar($variableName)
    {
        unset($this->viewAttributes[$variableName]);
    }

    public function compactVars()
    {
        $this->updatePageAttributes();
        return $this->viewAttributes;
    }
}

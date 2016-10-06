<?php

namespace App\Http\Controllers\Traits;

use App\Contact;

trait LayoutResolver
{
    private $viewAttributes = [];

    public function __construct()
    {
        $this->viewAttributes['page'] = (object) [
            'title' => null,
            'name' => null,
        ];

        $this->updateDefaultAttributes();
    }

    public function updateDefaultAttributes()
    {
        if (!empty($this->title)) {
            $this->viewAttributes['page']->title = $this->title;
        }

        if (!empty($this->page)) {
            $this->viewAttributes['page']->name = $this->page;
        }

        $this->viewAttributes['contact'] = Contact::firstOrNew([]);
        $this->viewAttributes['cart'] = session()->get('cart');
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
        $this->updateDefaultAttributes();
        return $this->viewAttributes;
    }
}

<?php

namespace App;

use Illuminate\Support\Str;

trait Slugglable
{
    /**
     * Create a conversation slug.
     *
     * @param  string|null $text
     * @return string
     */
    public function makeSlug($text = null)
    {
        if ($text === null &&
            property_exists($this, 'slugBaseColumn') &&
            isset($this->attributes[ $this->slugBaseColumn ])
        ) {
            $text = $this->{$this->slugBaseColumn};
        } else {
            return "";
        }

        $slug  = Str::slug($text);
        $count = $this::whereRaw("{$this->slugColumn} RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function saveSlug($text = null)
    {
        $columnName = property_exists($this, 'slugColumn') ? $this->slugColumn : "slug";
        $this->{$columnName} = $this->makeSlug($text);
        return $this;
    }
}

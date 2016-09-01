<?php

namespace App;

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
        if ($text === null && property_exists($this, 'slugfield')) {
            $text = $this->slugfield;
        } else {
            return "";
        }

        $slug  = Str::slug($text);
        $count = $this::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}

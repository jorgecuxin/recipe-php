<?php

class ListingPremium extends ListingBasic
{
    private $status = 'premium';
    private $descripcion;
    private $allowed_tags = '<p><br><b><strong><em><u><ol><ul><li>';

    /**
     * Gets the local property $descripcion
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Cleans up and sets the local property $descripcion
     * @param string $value to set property
     */
    public function setDescripcion($value)
    {
        $this->descripcion = trim(strip_tags($value, $this->allowed_tags));
    }
}

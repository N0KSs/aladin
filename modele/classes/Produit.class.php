<?php

/**
 * Produit
 * Classe pour les Produits
 */
class Produit
{
    private string $id;
    private string $name;
    private int $quantity;
    private float $price;
    private string $imgUrl;
    private string $description;

    function __construct(string $id = '', string $name = '', int $quantity = 0, float $price = 0, string $img_url = '', string $description = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->imgUrl = $img_url;
        $this->description = $description;
    }

    // Getters/Setters :

    // Getter et Setter pour $id
    function getId(): string
    {
        return $this->id;
    }

    function setId(string $id): void
    {
        $this->id = $id;
    }

    // Getter et Setter pour $name
    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name): void
    {
        $this->name = $name;
    }

    // Getter et Setter pour $quantity
    function getQuantity(): int
    {
        return $this->quantity;
    }

    function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    // Getter et Setter pour $price
    function getPrice(): float
    {
        return $this->price;
    }

    function setPrice(float $price): void
    {
        $this->price = $price;
    }

    // Getter et Setter pour $imgUrl
    function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    function setImgUrl(string $imgUrl): void
    {
        $this->imgUrl = $imgUrl;
    }

    // Getter et Setter pour $description
    function getDescription(): string
    {
        return $this->description;
    }

    function setDescription(string $description): void
    {
        $this->description = $description;
    }
}

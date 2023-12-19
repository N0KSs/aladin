<?php

/**
 * User
 * Classe pour les Users
 */
class User
{
    private int $id;
    private string $userName;
    private string $email;
    private string $pwd;
    private string $firstName;
    private string $lastName;
    private int $billingAddressId;
    private int $shippingAddressId;
    private string $token;
    private int $roleId;

    function __construct(
        int $id = 0,
        string $userName = '',
        string $email = '',
        string $pwd = '',
        string $firstName = '',
        string $lastName = '',
        int $billingAddressId = 0,
        int $shippingAddressId = 0,
        string $token = '',
        int $roleId = 0
    ) {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->billingAddressId = $billingAddressId;
        $this->shippingAddressId = $shippingAddressId;
        $this->token = $token;
        $this->roleId = $roleId;
    }

    // Getters/Setters :

    // Getter et Setter pour $id
    function getId(): int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter et Setter pour $userName
    function getUserName(): string
    {
        return $this->userName;
    }

    function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    // Getter et Setter pour $email
    function getEmail(): string
    {
        return $this->email;
    }

    function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Getter et Setter pour $pwd
    function getPwd(): string
    {
        return $this->pwd;
    }

    function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }

    // Getter et Setter pour $firstName
    function getFirstName(): string
    {
        return $this->firstName;
    }

    function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    // Getter et Setter pour $lastName
    function getLastName(): string
    {
        return $this->lastName;
    }

    function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    // Getter et Setter pour $billingAddressId
    function getBillingAddressId(): int
    {
        return $this->billingAddressId;
    }

    function setBillingAddressId(int $billingAddressId): void
    {
        $this->billingAddressId = $billingAddressId;
    }

    // Getter et Setter pour $shippingAddressId
    function getShippingAddressId(): int
    {
        return $this->shippingAddressId;
    }

    function setShippingAddressId(int $shippingAddressId): void
    {
        $this->shippingAddressId = $shippingAddressId;
    }

    // Getter et Setter pour $token
    function getToken(): string
    {
        return $this->token;
    }

    function setToken(string $token): void
    {
        $this->token = $token;
    }

    // Getter et Setter pour $roleId
    function getRoleId(): int
    {
        return $this->roleId;
    }

    function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }
}

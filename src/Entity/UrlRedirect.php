<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UrlRedirectRepository")
 */
class UrlRedirect
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $baseUrl;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $generatedUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function getGeneratedUrl(): ?string
    {
        return $this->generatedUrl;
    }

    public function setGeneratedUrl(string $generatedUrl): self
    {
        $this->generatedUrl = $generatedUrl;

        return $this;
    }
}

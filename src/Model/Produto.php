<?php

class Produto
{
    // constructor em PHP é uma função que é chamada automaticamente quando um objeto é criado a partir de uma classe.
    public function __construct(?int $id, string $nome, string $descricao, string $tipo, float $preco, string $imagem = "logo-serenato.png")
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->tipo = $tipo;
        $this->preco = $preco;
    }


    private ?int $id;
    private string $nome;
    private string $descricao;
    private string $imagem;
    private string $tipo;
    private float $preco;


    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPrecoFormatado(): string
    {
        return "R$ " . number_format($this->preco, 2, ',', '.');
    }

    public function getPrecoFloat(): string
    {
        return number_format($this->preco, 2);
    }

    public function getImagemCaminho(): string
    {
        return "img/" . $this->imagem;
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }
}
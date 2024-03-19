<?php

class ProdutoRepository
{
    private PDO $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function buscarProdutos(string $tipo): array
    {  
        $sql = "SELECT * FROM produtos WHERE tipo = :tipo";     
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":tipo", $tipo);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($produto) {
            return new Produto(
                $produto['id'],
                $produto['nome'],
                $produto['descricao'],
                $produto['tipo'],
                $produto['preco'],
                $produto['imagem'],
            );
        }, $produtos);
    }

    // pega todos os produtos
    public function pegaTodos(): array
    {
         $sql = "SELECT * FROM produtos";
        $stmt = $this->conexao->query($sql);
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($produto) {
            return new Produto(
                $produto['id'],
                $produto['nome'],
                $produto['descricao'],
                $produto['tipo'],
                $produto['preco'],
                $produto['imagem'],
            );
        }, $produtos);
    }

    public function deleteProduto(int $id): void
    {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql); 
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function salvarProduto(Produto $produto): void
    {
        $sql = "INSERT INTO produtos (nome, descricao, imagem, tipo, preco) VALUES (:nome, :descricao, :imagem, :tipo, :preco)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":imagem", $produto->getImagem());
        $stmt->bindValue(":tipo", $produto->getTipo());
        $stmt->bindValue(":preco", $produto->getPreco());
        $stmt->execute();
    }
}

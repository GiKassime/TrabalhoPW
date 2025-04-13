<?php 
class Palpite{
    private string $titulo;
    private string $descricao;
    private int $dataLancamento;
    private string $diretor;
    private string $imagem;

    public function __construct(string $titulo, string $descricao, int $dataLancamento, string $diretor, string $imagem){ 
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->dataLancamento = $dataLancamento;
        $this->diretor = $diretor;
        $this->imagem = $imagem;
        
    }
    public function escreveFilme($numeroPalpite){
        $filme = "<div class='filmeSorteado'>";
        $filme .= "<h2>$numeroPalpite</h2>";
        $filme .= "<img src='" . $this->imagem . "' alt='Imagem do filme " . $this->titulo . "'>";
        $filme .= "<h2>" . $this->titulo . "</h2>";
        $filme .= "<p>" . $this->descricao . "</p>";
        $filme .= "<p>Data de Lançamento: " . $this->dataLancamento . "</p>";
        $filme .= "<p>Diretor: " . $this->diretor . "</p>";
        $filme .= "</div>";
        return $filme;
    }
    /**
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of dataLancamento
     */
    public function getDataLancamento(): int
    {
        return $this->dataLancamento;
    }

    /**
     * Set the value of dataLancamento
     */
    public function setDataLancamento(int $dataLancamento): self
    {
        $this->dataLancamento = $dataLancamento;

        return $this;
    }

    /**
     * Get the value of diretor
     */
    public function getDiretor(): string
    {
        return $this->diretor;
    }

    /**
     * Set the value of diretor
     */
    public function setDiretor(string $diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    /**
     * Get the value of imagem
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     */
    public function setImagem(string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }
}

?>
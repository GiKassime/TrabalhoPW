# Instituto Federal do Paraná – Campus Foz do Iguaçu  

## Informações Gerais  
**Professor:** Daniel Di Domenico  
**Curso:** Técnico em Desenvolvimento de Sistemas  
**Disciplina:** Linguagem de Programação para Web  
**Carga Horária:** 120 horas aula  
**Período:** 3º ano  
**Data:** 07/04/2025  

---

## Atividade – Métodos GET e POST  

### Descrição  
A atividade consiste em implementar um **Jogo da Adivinhação** utilizando PHP para Web. O jogo deve ser acessado pelo navegador, passando um parâmetro GET denominado `palpite`.  

Exemplo de chamada:  
```
localhost/jogo.php?palpite=2
```

### Regras do Jogo  
1. **Situação A:**  
    - O usuário informou o parâmetro `palpite` e **ACERTOU**.  
    - Exibir uma mensagem de parabéns e mostrar todos os dados do objeto correspondente ao palpite correto.  

2. **Situação B:**  
    - O usuário informou o parâmetro `palpite`, mas **ERROU**.  
    - Exibir uma mensagem de erro e, opcionalmente, uma dica ou imagem borrada do palpite correto.  

3. **Situação C:**  
    - O usuário **não informou** o parâmetro `palpite`.  
    - Exibir uma mensagem solicitando que o parâmetro seja informado.  

---

### Requisitos Mínimos  
- **Classe Base:**  
  - Deve conter ao menos 2 atributos: `nome` e `link` (para uma imagem).  

- **Objetos:**  
  - Criar 3 objetos a partir da classe (palpites 1, 2 e 3).  
  - Exibir os dados do objeto correspondente ao palpite correto.  

- **Aleatoriedade:**  
  - Utilizar uma função de números randômicos para definir o objeto correto a cada tentativa.  

---

### Sugestões de Implementação  
- Mostrar uma **dica** em caso de palpite errado.  
- Exibir uma **imagem borrada** do palpite correto em caso de erro.  
- Criar uma **página inicial** com links para os palpites (1, 2 ou 3).  
- Adicionar outros parâmetros, como `config`, para alterar o comportamento do jogo.  
- Implementar funcionalidades adicionais conforme sua criatividade.  

---  
**Boa sorte e divirta-se desenvolvendo o jogo!**  
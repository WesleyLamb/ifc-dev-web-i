

6. Criar um site de e-commerce para uma loja de informática ou outro tema. O site deve conter as seguintes páginas:
   - [ ] Página Inicial: exibir todos os produtos disponíveis para venda. Adicionar filtros para pesquisar produtos por categoria e marca. Adicione um campo de busca para pesquisar produtos por nome.
   - [ ] Detalhes do produto: exibir informações detalhadas sobre o produto, como nome, descrição, preço, fotos, etc.
   - [ ] Carrinho de compras: exibir os produtos adicionados ao carrinho, quantidade, preço total, etc. Permitir adicionar, remover e alterar a quantidade de produtos no carrinho.
   - [ ] Checkout: exibir um formulário para o usuário informar os dados de entrega e pagamento.
   - [ ] Navegação: adicionar um menu de navegação para alternar entre as páginas. Escolha um menu de navegação que seja acessível e responsivo em dispositivos móveis.
   - [ ] Rodapé: exibir informações sobre a loja, formas de pagamento, redes sociais, etc.
   - [ ] Adicionar um botão para adicionar o produto ao carrinho. Use a API `localStorage` para armazenar os produtos no carrinho.
   - [ ] Adicionar um botão para remover o produto do carrinho. Exibir uma página ou modal de confirmação antes de remover o produto.
   - [ ] Adicionar um botão para finalizar a compra. Exibir uma página ou modal de confirmação antes de finalizar a compra.
   - [ ] **Acessibilidade**: respeitar o critério 2.4.3 sobre foco do alvo da WCAG disponível em: [https://www.guia-wcag.com/](https://www.guia-wcag.com/).
   - [ ] **Acessibilidade**: respeitar o critério 3.3.1 sobre identificação de erros da WCAG disponível em: [https://www.guia-wcag.com/](https://www.guia-wcag.com/).
   - [ ] **Acessibilidade**: respeitar o critério 4.1.1 sobre nome, função e valor da WCAG disponível em: [https://www.guia-wcag.com/](https://www.guia-wcag.com/).
   - [ ] (opcional) Adicionar um sistema de avaliação de produtos com estrelas. Permitir que o usuário possa avaliar e comentar sobre o produto.
   - [ ] (opcional) Usar uma API de pagamento, como o PayPal ou Stripe, para simular o pagamento.
   - [ ] (opcional) Adicionar um sistema de recomendação de produtos baseado nas preferências do usuário.

Os produtos podem estar disponíveis em um arquivo JSON (Exemplo abaixo) ou em uma API externa como [https://dummyjson.com/docs/products](https://dummyjson.com/docs/products).

```json
[
  {
    "id": 1,
    "name": "Notebook",
    "description": "Notebook Dell Inspiron 15 3000",
    "price": 2999.99,
    "category": "Notebook",
    "brand": "Dell",
    "images": ["notebook-dell.jpg", "notebook-dell-2.jpg"]
  },
  {
    "id": 2,
    "name": "Monitor",
    "description": "Monitor LG 24' LED Full HD",
    "price": 899.99,
    "category": "Monitor",
    "brand": "LG",
    "images": ["monitor-lg.jpg", "monitor-lg-2.jpg"]
  },
  {
    "id": 3,
    "name": "Teclado",
    "description": "Teclado Mecânico Gamer HyperX Alloy FPS",
    "price": 299.99,
    "category": "Teclado",
    "brand": "HyperX",
    "images": ["teclado-hyperx.jpg", "teclado-hyperx-2.jpg"]
  }
]
```
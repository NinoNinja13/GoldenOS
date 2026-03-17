

### ⚖️ **AVISO DE SOBERANIA E CRÉDITOS**

> **"A liberdade é o núcleo do GoldenOS, mas a gratidão é a sua base."**

O **GoldenOS** é um projeto **Open Source** e você tem total liberdade para **estudar, modificar e distribuir** o código. No entanto, existe uma regra de ouro inegociável:

⚠️ **É ESTRITAMENTE PROIBIDO REMOVER OS CRÉDITOS ORIGINAIS DO AUTOR.**

Este sistema não foi gerado por uma empresa bilionária; ele é o resultado direto de **centenas de horas de engenharia, noites sem sono e muito café**.

* **Você pode:** Alterar o tema, criar novos apps, mudar as funcionalidades e adaptar o sistema para o seu uso.
* **Você NÃO pode:** Apagar ou ocultar o nome do criador original no código-fonte ou na interface de créditos.

**Respeite a jornada.** Se você encontrou valor neste 1MB de liberdade, mantenha a assinatura de quem transformou essa visão em realidade. A remoção dos créditos desvaloriza a comunidade e o espírito de soberania digital.

---


# 📀 **GoldenOS — A Liberdade em 1MB**

> *"Adeus empresas me controlando... Finalmente algo que é realmente meu."*

O **GoldenOS** não é apenas um script; é um manifesto técnico transformado em software. Ele é um ecossistema **modular, leve e totalmente independente**, desenvolvido para converter qualquer navegador moderno em um **Desktop de alta performance**. Criado sob a filosofia de **soberania digital**, ele prova que é possível unir a robustez do **PHP puro** com a elegância de interfaces **Full-Stack** sem depender de frameworks pesados.

---

### 🚀 **Por que o GoldenOS é Único?**

* 📦 **Engenharia de Micro-Escala:** Um sistema operacional completo compactado em **~1MB**. São mais de **7.135 linhas de código** otimizadas para carregamento instantâneo.
* 🧠 **Inteligência de Interface:** Possui um gerenciador de janelas avançado com **Snap Automático** (organização inteligente), lixeira funcional e uma Dock dinâmica que reage ao redimensionamento.
* 🎮 **Hardware Agnostic:** Projetado para ser universal. Possui drivers internos para **Gamepad (controles de console)**, gestos **Touch** e precisão de **Mouse/Teclado**.
* ⚡ **Independência de Nuvem:** Diferente de WebDesktops comuns, o GoldenOS foi feito para rodar **offline ou em rede local** via micro-servidores (como o **KSWEB** no Android), garantindo que seus dados nunca saiam do seu hardware.
* 🎨 **Motor de Personalização:** Sistema de **Wallpapers Vivos** baseados em JSON, permitindo animações matemáticas complexas e Shaders de GPU sem pesar no processamento.
* 🛠️ **Ecossistema Expansível:** Uma verdadeira "Fábrica de Apps". Integre qualquer ferramenta HTML/JS/PHP em segundos apenas editando um arquivo de texto.

---

### 📂 **Arquitetura e Estrutura de Pastas**

Para garantir que o sistema localize seus aplicativos e configurações, a hierarquia de arquivos deve ser seguida rigorosamente. O Linux e os servidores Web são **Case Sensitive** (diferenciam maiúsculas de minúsculas).

```text
/Diretorio_Raiz/ (Ex: htdocs/golden)
│
├── index.php                <-- O "Cérebro" (Núcleo do GoldenOS)
├── apps.json                <-- O "Registro" (Obrigatório: lista todos os apps)
│
├── apps/                    <-- Pasta de Binários e Scripts
│   ├── GoldenZap/           │   (Cada pasta contém o index.php ou index.html 
│   ├── GoldenNotes/         │    do respectivo aplicativo)
│   └── ...                  
│
└── wallpapers/              <-- Pasta de Personalização Visual
    ├── index.json           <-- O "Catálogo" de Wallpapers
    ├── nebula.json          <-- Lógica de animação de um wallpaper
    ├── nebula.png           <-- Prévia visual (opcional, para o menu)
    └── ...

```

---

### 🛠️ **GUIA DEFINITIVO DE CUSTOMIZAÇÃO**

---

## 1. 📌 **Gerenciando o Menu de Aplicativos (`apps.json`)**

O arquivo **`apps.json`** funciona como o seu "Banco de Dados". Se um app não estiver aqui, ele não existe para o sistema. Ele deve residir obrigatoriamente na **mesma pasta** que o `index.php`.

### **Como adicionar um Novo App/Link:**

Abra o `apps.json` e insira um novo bloco de código seguindo este padrão:

```json
"69abc_ID_UNICO": {
  "name": "Meu Novo App 🔹",
  "file": "apps/MeuApp/index.php",
  "icon": "meu_icone.png",
  "category": "apps"
}

```

### **Detalhamento dos Parâmetros:**

* **`ID_UNICO`**: Utilize uma sequência alfanumérica única. **Importante:** Se você repetir um ID, o sistema substituirá o item anterior pelo novo.
* **`name`**: O título que aparecerá na interface. Você pode usar **Emojis** para dar estilo.
* **`file`**:
* **App Interno:** Caminho da pasta (Ex: `apps/Calculadora/index.html`).
* **Web App:** Link direto (Ex: `https://gemini.google.com`).


* **`icon`**: Nome da imagem (preferencialmente PNG transparente) que representa o app.
* **`category`**: Define em qual aba o item aparecerá. Valores aceitos: `"apps"`, `"games"`, `"downloads"` ou `"webs"`.

> **⚠️ ATENÇÃO À SINTAXE:** Todo item deve ser seguido por uma **vírgula ( , )**, **EXCETO o último item** de cada seção. Um erro de vírgula impedirá o GoldenOS de iniciar.

---

## 🎨 2. **Criando Wallpapers Animados (JSON Engine)**

O GoldenOS não usa vídeos pesados para fundo de tela; ele usa matemática e vetores (SVG/WebGL).

### **Fase A: Registro no `wallpapers/index.json**`

Este arquivo é o índice que o sistema consulta ao abrir as "Configurações de Personalização".

```json
{
  "wallpapers": [
    {
      "id": "matrix_rain",
      "name": "Matrix Digital Rain 📟",
      "file": "wallpapers/matrix.json"
    }
  ]
}

```

### **Fase B: Desenvolvimento da Animação**

Crie o arquivo JSON correspondente (ex: `matrix.json`). Você tem três caminhos de criação:

#### **Tipo 1: SVG Dinâmico (Vetorial)**

Utiliza elementos geométricos que se movem. É o método mais leve para a bateria.

* **`config`**: Define o `bg` (cor sólida ou gradiente) e o `viewBox`.
* **`elements`**: Lista de objetos (`rect`, `circle`, `path`).
* **`animate`**: Define o comportamento (Ex: `attributeName: "opacity"`, `values: "0;1;0"`, `dur: "2s"`).

#### **Tipo 2: Shader WebGL (Alta Performance)**

Para efeitos de fluidos, fumaça ou luzes neon.

* Você deve inserir o código **GLSL (Fragment Shader)** diretamente no campo `"shader"`.
* O sistema injeta automaticamente as variáveis `uniform float time;` (tempo decorrido) e `uniform vec2 resolution;` (tamanho da tela).

---

## 🗑️ **Como Remover ou Desinstalar Itens**

Para remover qualquer item do sistema:

1. Localize o bloco de código referente ao **ID** que deseja excluir.
2. Apague o trecho que vai da Chave de Abertura `{` até a Chave de Fechamento `}`.
3. **Ponto Crítico:** Se o item removido era o último da lista, você **deve remover a vírgula** do item anterior para manter o JSON válido.

---

### 💽 **Demonstração Visual**

📺 **Assista ao Vídeo de Demonstração:** [Clique aqui para ver no YouTube](https://youtu.be/-3YMQ4WX3Dg)

<img width="1280" height="720" alt="Image" src="https://github.com/user-attachments/assets/54f921f9-1c52-4a13-8b93-cbaf263c0471" />
---

### 💻 **Ambiente de Execução Recomendado**

* **PC (Windows/Linux/Mac):** **XAMPP** ou **Apache** com PHP 7.4+.
* **Mobile (Android):** **KSWEB** (servidor local para rodar o GoldenOS no bolso).
* **Navegador:** Chrome, Edge ou Firefox (Safari pode ter limitações em Shaders específicos).


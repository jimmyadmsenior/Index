console.log("Chatbot JS carregado");

class Chatbox {
    constructor() {
        this.args = {
            openButton: document.querySelector(".chatbox__button button"),
            chatBox: document.querySelector(".chatbox__support"),
            sendButton: document.querySelector(".send__button"),
        }
        this.state = false;
        this.messages = [];
        this.step = 0;
        this.answers = [];
        this.questions = [
            "Qual faixa de preço você procura? (ex: até R$2000, até R$4000, acima de R$4000)",
            "Qual tipo de produto você quer? (Smartphone, Notebook, Fone, Relógio, Tablet)",
            "Tem marca preferida? (Apple, Samsung, Outra, Tanto faz)",
            "Qual seu uso principal? (Trabalho, Estudo, Lazer, Esporte, Outro)"
        ];
        this.products = [
            {nome: "iPhone 14", preco: 7000, tipo: "Smartphone", marca: "Apple", uso: ["Trabalho", "Lazer", "Estudo"]},
            {nome: "Galaxy Book4", preco: 5000, tipo: "Notebook", marca: "Samsung", uso: ["Trabalho", "Estudo"]},
            {nome: "Apple Watch Series 8", preco: 3500, tipo: "Relógio", marca: "Apple", uso: ["Esporte", "Lazer"]},
            {nome: "Galaxy Tab S6", preco: 2500, tipo: "Tablet", marca: "Samsung", uso: ["Estudo", "Lazer"]},
            {nome: "Fone Samsung Buds", preco: 800, tipo: "Fone", marca: "Samsung", uso: ["Lazer", "Esporte"]},
            {nome: "Fone Apple AirPods", preco: 1200, tipo: "Fone", marca: "Apple", uso: ["Lazer", "Trabalho"]}
        ];
    }

    display() {
        const { openButton, chatBox, sendButton } = this.args;
        openButton.addEventListener("click", () => this.toggleState());
        sendButton.addEventListener("click", () => this.onSendButton(chatBox));
        const node = chatBox.querySelector('input');
        node.addEventListener("keyup", ({ key }) => {
            if (key === "Enter") {
                this.onSendButton(chatBox);
            }
        });
        // Inicia a conversa
        this.messages = [];
        this.step = 0;
        this.answers = [];
        this.addBotMessage("Olá! Vou te ajudar a encontrar o produto ideal. Responda algumas perguntas:");
        this.addBotMessage(this.questions[0]);
        this.updateChatText(chatBox);
    }

    toggleState() {
        this.state = !this.state;
        const chatbox = document.querySelector('.chatbox');
        if (this.state) {
            chatbox.classList.add("chatbox--active");
        } else {
            chatbox.classList.remove("chatbox--active");
        }
    }

    onSendButton(chatBox) {
        var textField = chatBox.querySelector('input');
        let text1 = textField.value.trim();
        if (text1 === "") return;
        this.addUserMessage(text1);
        textField.value = "";
        // Função de reiniciar
        if (text1.toLowerCase() === "reiniciar") {
            this.messages = [];
            this.step = 0;
            this.answers = [];
            this.addBotMessage("Vamos começar de novo! Responda as perguntas:");
            this.addBotMessage(this.questions[0]);
            this.updateChatText(chatBox);
            return;
        }
        this.answers.push(text1);
        this.step++;
        if (this.step < this.questions.length) {
            this.addBotMessage(this.questions[this.step]);
            this.updateChatText(chatBox);
        } else {
            // Recomendar produtos
            const recomendados = this.recomendarProdutos();
            if (recomendados.length > 0) {
                this.addBotMessage("Minhas recomendações para você:");
                recomendados.forEach(prod => {
                    this.addBotMessage(`• ${prod.nome} (${prod.marca}) - R$${prod.preco}`);
                });
            } else {
                this.addBotMessage("Não encontrei produtos que combinam com suas preferências. Tente novamente!");
            }
            this.addBotMessage("Se quiser reiniciar, digite: reiniciar");
            this.updateChatText(chatBox);
            this.step = this.questions.length; // trava
        }
    }

    addBotMessage(msg) {
        this.messages.push({ name: "Índigo", message: msg });
    }
    addUserMessage(msg) {
        this.messages.push({ name: "User", message: msg });
    }

    recomendarProdutos() {
        // Lógica simples baseada nas respostas
        let [preco, tipo, marca, uso] = this.answers;
        preco = preco.toLowerCase();
        tipo = tipo.toLowerCase();
        marca = marca.toLowerCase();
        uso = uso.toLowerCase();
        let faixa = 999999;
        if (preco.includes("2000")) faixa = 2000;
        else if (preco.includes("4000")) faixa = 4000;
        // Filtra produtos
        let filtrados = this.products.filter(p => {
            let ok = true;
            if (faixa < 999999) ok = ok && p.preco <= faixa;
            if (tipo !== "tanto faz" && tipo !== "qualquer") ok = ok && p.tipo.toLowerCase().includes(tipo);
            if (marca !== "tanto faz" && marca !== "outra" && marca !== "qualquer") ok = ok && p.marca.toLowerCase().includes(marca);
            if (uso !== "tanto faz" && uso !== "qualquer") ok = ok && p.uso.map(u=>u.toLowerCase()).includes(uso);
            return ok;
        });
        if (filtrados.length === 0) filtrados = this.products.slice(0,3);
        return filtrados.slice(0,3);
    }

    updateChatText(chatBox) {
        var html = '';
        this.messages.slice().reverse().forEach(function (item) {
            if (item.name === "Índigo") {
                html += '<div class="messages__item messages__item--visitor"><b>Índigo:</b> ' + item.message + '</div>';
            } else {
                html += '<div class="messages__item messages__item--operator">' + item.message + '</div>';
            }
        });
        const chatmessage = chatBox.querySelector('.chatbox__messages');
        chatmessage.innerHTML = html;
    }
}

const chatbox = new Chatbox();
chatbox.display();
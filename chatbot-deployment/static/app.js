class Chatbox {
    constructor() {
        this.args = {
            openButton: document.querySelector("chatbox__button"),
            chatBox: document.querySelector("chatbox__support"),
            sendButton: document.querySelector("send_button"),
        }

        this.state = false;
        this.messages = [];
    }
}
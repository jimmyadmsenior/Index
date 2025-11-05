@extends('layouts.app')
@section('head')
@endsection
@section('content')
<div class="chatbot-container">
    <div class="chatbot-widget">
        <div class="chatbot-header">
            <h3>Assistente Virtual</h3>
            <button class="minimize-btn">−</button>
        </div>
        <div class="chatbot-messages" id="chatbot-messages">
            <!-- Mensagens aparecerão aqui -->
        </div>
        <div class="chatbot-input-area">
            <input type="text" id="chatbot-input" placeholder="Digite sua mensagem...">
            <button id="send-btn">Enviar</button>
        </div>
    </div>
</div>

<script src="/media/ChatBot/ModernChatBot.js"></script>

<style>
.chatbot-container {
    padding: 20px;
    max-width: 800px;
    margin: 0 auto;
}

.chatbot-widget {
    border: 1px solid #ddd;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.chatbot-header {
    background: #007AFF;
    color: white;
    padding: 15px 20px;
    border-radius: 10px 10px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbot-header h3 {
    margin: 0;
}

.minimize-btn {
    background: none;
    border: none;
    color: white;
    font-size: 20px;
    cursor: pointer;
}

.chatbot-messages {
    height: 400px;
    overflow-y: auto;
    padding: 20px;
    background: #f9f9f9;
}

.chatbot-input-area {
    display: flex;
    padding: 15px 20px;
    border-top: 1px solid #eee;
}

.chatbot-input-area input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}

.chatbot-input-area button {
    padding: 10px 20px;
    background: #007AFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.chatbot-input-area button:hover {
    background: #0056CC;
}
</style>
@endsection
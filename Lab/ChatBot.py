import tkinter as tk
from tkinter import messagebox

# Lista de 30 celulares inventados
celulares = [
    {"nome": "Samsung Galaxy S21", "preco": 3500, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "iPhone 13", "preco": 6000, "sistema": "iOS", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Xiaomi Mi 11", "preco": 2800, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "Motorola Moto G100", "preco": 2200, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Google Pixel 6", "preco": 4000, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "OnePlus 9 Pro", "preco": 4500, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "iPhone SE", "preco": 2500, "sistema": "iOS", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "Samsung Galaxy A52", "preco": 1800, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Xiaomi Redmi Note 10", "preco": 1200, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Asus ROG Phone 5", "preco": 5000, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "iPhone 12", "preco": 5000, "sistema": "iOS", "prioridade": "Câmera", "bateria": "Curta"},
    {"nome": "Samsung Galaxy S20 FE", "preco": 2700, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Xiaomi Poco X3", "preco": 1500, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "Sony Xperia 5 III", "preco": 4800, "sistema": "Android", "prioridade": "Câmera", "bateria": "Curta"},
    {"nome": "Nokia 8.3", "preco": 2000, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "iPhone 11", "preco": 3500, "sistema": "iOS", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Samsung Galaxy Z Flip", "preco": 7000, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "Xiaomi Mi 10T", "preco": 2300, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "Oppo Find X3 Pro", "preco": 5500, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Realme GT", "preco": 2600, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "iPhone XR", "preco": 3000, "sistema": "iOS", "prioridade": "Câmera", "bateria": "Curta"},
    {"nome": "Samsung Galaxy Note 20", "preco": 4500, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "Xiaomi Black Shark 4", "preco": 3200, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "LG Velvet", "preco": 2000, "sistema": "Android", "prioridade": "Câmera", "bateria": "Curta"},
    {"nome": "iPhone 8 Plus", "preco": 2000, "sistema": "iOS", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "Samsung Galaxy A72", "preco": 2500, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Xiaomi Mi Note 10", "preco": 2800, "sistema": "Android", "prioridade": "Câmera", "bateria": "Longa"},
    {"nome": "Sony Xperia 1 III", "preco": 6000, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Curta"},
    {"nome": "Motorola Edge 20", "preco": 3000, "sistema": "Android", "prioridade": "Desempenho", "bateria": "Longa"},
    {"nome": "iPhone 12 Mini", "preco": 4000, "sistema": "iOS", "prioridade": "Câmera", "bateria": "Curta"},
]

# Função para recomendar celulares com base nas respostas
def recomendar_celulares():
    # Coleta as respostas
    orcamento = orcamento_var.get()
    sistema = sistema_var.get()
    prioridade = prioridade_var.get()
    bateria = bateria_var.get()

    # Filtra os celulares com base nas respostas
    recomendados = []
    for celular in celulares:
        # Verifica orçamento
        if orcamento == "a" and celular["preco"] > 1000:
            continue
        elif orcamento == "b" and (celular["preco"] < 1000 or celular["preco"] > 2000):
            continue
        elif orcamento == "c" and celular["preco"] < 2000:
            continue

        # Verifica sistema operacional
        if sistema == "a" and celular["sistema"] != "Android":
            continue
        elif sistema == "b" and celular["sistema"] != "iOS":
            continue

        # Verifica prioridade
        if prioridade == "a" and celular["prioridade"] != "Câmera":
            continue
        elif prioridade == "b" and celular["prioridade"] != "Desempenho":
            continue

        # Verifica bateria
        if bateria == "a" and celular["bateria"] != "Longa":
            continue
        elif bateria == "b" and celular["bateria"] == "Longa":
            continue

        # Se passar por todos os filtros, adiciona à lista de recomendados
        recomendados.append(celular)

    # Exibe os 3 primeiros celulares recomendados
    if recomendados:
        resultado = "Aqui estão os celulares ideais para você:\n\n"
        for i, celular in enumerate(recomendados[:3], start=1):
            resultado += f"{i}. {celular['nome']} (Preço: R$ {celular['preco']}, Sistema: {celular['sistema']}, Prioridade: {celular['prioridade']}, Bateria: {celular['bateria']})\n"
        messagebox.showinfo("Resultado", resultado)
    else:
        messagebox.showinfo("Resultado", "Nenhum celular encontrado com base nas suas respostas.")

# Configuração da interface gráfica
root = tk.Tk()
root.title("Chatbot de Recomendação de Celulares")

# Variáveis para armazenar as respostas
orcamento_var = tk.StringVar()
sistema_var = tk.StringVar()
prioridade_var = tk.StringVar()
bateria_var = tk.StringVar()

# Pergunta 1: Orçamento
tk.Label(root, text="1. Qual é o seu orçamento?").grid(row=0, column=0, sticky="w")
tk.Radiobutton(root, text="Até R$ 1000", variable=orcamento_var, value="a").grid(row=1, column=0, sticky="w")
tk.Radiobutton(root, text="R$ 1000 a R$ 2000", variable=orcamento_var, value="b").grid(row=2, column=0, sticky="w")
tk.Radiobutton(root, text="Acima de R$ 2000", variable=orcamento_var, value="c").grid(row=3, column=0, sticky="w")

# Pergunta 2: Sistema Operacional
tk.Label(root, text="2. Você prefere Android ou iOS?").grid(row=4, column=0, sticky="w")
tk.Radiobutton(root, text="Android", variable=sistema_var, value="a").grid(row=5, column=0, sticky="w")
tk.Radiobutton(root, text="iOS", variable=sistema_var, value="b").grid(row=6, column=0, sticky="w")

# Pergunta 3: Prioridade
tk.Label(root, text="3. Qual é a prioridade para você: câmera ou desempenho?").grid(row=7, column=0, sticky="w")
tk.Radiobutton(root, text="Câmera", variable=prioridade_var, value="a").grid(row=8, column=0, sticky="w")
tk.Radiobutton(root, text="Desempenho", variable=prioridade_var, value="b").grid(row=9, column=0, sticky="w")

# Pergunta 4: Bateria
tk.Label(root, text="4. Você precisa de um celular com bateria de longa duração?").grid(row=10, column=0, sticky="w")
tk.Radiobutton(root, text="Sim", variable=bateria_var, value="a").grid(row=11, column=0, sticky="w")
tk.Radiobutton(root, text="Não", variable=bateria_var, value="b").grid(row=12, column=0, sticky="w")

# Botão para recomendar
tk.Button(root, text="Recomendar Celulares", command=recomendar_celulares).grid(row=13, column=0, pady=10)

# Executa a interface
root.mainloop()
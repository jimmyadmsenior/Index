function validarCampo() {
    const campo = document.getElementById("input-field");
    const wrapper = document.getElementById("input-wrapper");
    const mensagemErro = document.getElementById("mensagem-erro");
  
    if (campo.value.trim() === "") {
      campo.classList.add("erro"); // Adiciona a classe erro ao campo
      mensagemErro.style.display = "block";
      console.log("Erro: campo vazio");
      return false;
    } else {
      campo.classList.remove("erro"); // Remove a classe erro quando o campo não está vazio
      mensagemErro.style.display = "none";
      return true;
    }
  }
  
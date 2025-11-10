@extends('layouts.app')

@section('content')
<main class="container" style="padding-top: 80px;">
  <div style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
    <h1 style="font-size: 48px; font-weight: bold; margin-bottom: 40px; text-align: center;">Central de Suporte</h1>
    
    <div style="font-size: 16px; line-height: 1.6; color: #333;">
      <p style="margin-bottom: 40px; text-align: center; font-size: 18px; color: #666;">
        Estamos aqui para ajudar! Encontre respostas para suas dúvidas ou entre em contato conosco.
      </p>

      <!-- Seção de Contato Rápido -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; margin-bottom: 50px;">
        <div style="background: #111; padding: 30px; border-radius: 15px; text-align: center; color: white;">
          <div style="font-size: 40px; margin-bottom: 15px;">📞</div>
          <h3 style="font-size: 20px; margin-bottom: 10px; color: white;">Atendimento por Telefone</h3>
          <p style="margin-bottom: 15px; color: #f0f0f0;">Segunda a Sexta: 9h às 18h</p>
          <p style="font-size: 18px; font-weight: bold; color: white;">(11) 9999-9999</p>
        </div>
        <div style="background: #111; padding: 30px; border-radius: 15px; text-align: center; color: white;">
          <div style="font-size: 40px; margin-bottom: 15px;">✉️</div>
          <h3 style="font-size: 20px; margin-bottom: 10px; color: white;">Email</h3>
          <p style="margin-bottom: 15px; color: #f0f0f0;">Respondemos em até 24h</p>
          <p style="font-size: 18px; font-weight: bold; color: white;">suporte@index.com</p>
        </div>
      </div>

      <!-- FAQ -->
      <h2 style="font-size: 32px; font-weight: bold; margin-bottom: 30px; text-align: center;">Perguntas Frequentes</h2>
      
      <div style="margin-bottom: 50px;">
        <div style="background: #f8f9fa; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
          <div style="padding: 20px; cursor: pointer; border-bottom: 1px solid #e9ecef;" onclick="toggleFaq(this)">
            <h4 style="margin: 0; font-size: 18px; display: flex; justify-content: space-between; align-items: center;">
              Como posso acompanhar meu pedido?
              <span style="font-size: 24px;">+</span>
            </h4>
          </div>
          <div style="padding: 0 20px; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
            <div style="padding: 20px 0;">
              <p>Você pode acompanhar seu pedido através da sua conta no site ou pelo email de confirmação que enviamos. Também enviamos atualizações por WhatsApp se você forneceu seu número.</p>
            </div>
          </div>
        </div>

        <div style="background: #f8f9fa; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
          <div style="padding: 20px; cursor: pointer; border-bottom: 1px solid #e9ecef;" onclick="toggleFaq(this)">
            <h4 style="margin: 0; font-size: 18px; display: flex; justify-content: space-between; align-items: center;">
              Qual é o prazo de entrega?
              <span style="font-size: 24px;">+</span>
            </h4>
          </div>
          <div style="padding: 0 20px; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
            <div style="padding: 20px 0;">
              <p>O prazo de entrega varia de acordo com sua localização e o produto escolhido. Geralmente é de 3 a 7 dias úteis para a região metropolitana e até 15 dias úteis para outras regiões do país.</p>
            </div>
          </div>
        </div>

        <div style="background: #f8f9fa; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
          <div style="padding: 20px; cursor: pointer; border-bottom: 1px solid #e9ecef;" onclick="toggleFaq(this)">
            <h4 style="margin: 0; font-size: 18px; display: flex; justify-content: space-between; align-items: center;">
              Como posso trocar ou devolver um produto?
              <span style="font-size: 24px;">+</span>
            </h4>
          </div>
          <div style="padding: 0 20px; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
            <div style="padding: 20px 0;">
              <p>Você tem até 7 dias para solicitar a troca ou devolução. O produto deve estar em perfeitas condições, na embalagem original. Entre em contato conosco para iniciar o processo.</p>
            </div>
          </div>
        </div>

        <div style="background: #f8f9fa; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
          <div style="padding: 20px; cursor: pointer; border-bottom: 1px solid #e9ecef;" onclick="toggleFaq(this)">
            <h4 style="margin: 0; font-size: 18px; display: flex; justify-content: space-between; align-items: center;">
              Quais formas de pagamento vocês aceitam?
              <span style="font-size: 24px;">+</span>
            </h4>
          </div>
          <div style="padding: 0 20px; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
            <div style="padding: 20px 0;">
              <p>Aceitamos cartões de crédito (Visa, Mastercard, American Express), cartões de débito, PIX, boleto bancário e transferência bancária.</p>
            </div>
          </div>
        </div>

        <div style="background: #f8f9fa; border-radius: 10px; margin-bottom: 15px; overflow: hidden;">
          <div style="padding: 20px; cursor: pointer; border-bottom: 1px solid #e9ecef;" onclick="toggleFaq(this)">
            <h4 style="margin: 0; font-size: 18px; display: flex; justify-content: space-between; align-items: center;">
              Os produtos têm garantia?
              <span style="font-size: 24px;">+</span>
            </h4>
          </div>
          <div style="padding: 0 20px; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
            <div style="padding: 20px 0;">
              <p>Sim! Todos os produtos possuem garantia do fabricante. Smartphones e tablets têm 1 ano de garantia, notebooks têm 1 ano, e acessórios têm 3 meses de garantia.</p>
            </div>
          </div>
        </div>
      </div>


      <!-- Horários de Atendimento -->
      <div style="text-align: center; margin-bottom: 50px;">
        <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Horários de Atendimento</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
          <div>
            <h4 style="font-weight: bold; margin-bottom: 10px;">📞 Telefone</h4>
            <p>Segunda a Sexta: 9h às 18h<br>Sábado: 9h às 14h<br>Domingo: Fechado</p>
          </div>
          <div>
            <h4 style="font-weight: bold; margin-bottom: 10px;">💬 Chat Online</h4>
            <p>Segunda a Sábado: 8h às 20h<br>Domingo: 10h às 16h</p>
          </div>
          <div>
            <h4 style="font-weight: bold; margin-bottom: 10px;">✉️ Email</h4>
            <p>24 horas por dia<br>Resposta em até 24h</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('styles')
<style>
  .container h1, .container h2, .container h3, .container h4 {
    color: var(--text-color);
  }
  
  .container p, .container li, .container label {
    color: var(--text-color);
  }
  
  [data-theme="dark"] .container div[style*="background: #f8f9fa"] {
    background: #2d3748 !important;
  }
  
  [data-theme="dark"] .container input,
  [data-theme="dark"] .container select,
  [data-theme="dark"] .container textarea {
    background: #4a5568;
    border: 1px solid #666;
    color: #e2e8f0;
  }
  
  .container button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  }
</style>
@endpush

@push('scripts')
<script>
function toggleFaq(element) {
  const content = element.nextElementSibling;
  const icon = element.querySelector('span');
  
  if (content.style.maxHeight && content.style.maxHeight !== '0px') {
    content.style.maxHeight = '0px';
    icon.textContent = '+';
  } else {
    content.style.maxHeight = content.scrollHeight + 'px';
    icon.textContent = '−';
  }
}
</script>
@endpush

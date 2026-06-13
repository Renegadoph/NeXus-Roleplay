<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NeXus Roleplay</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg, #0b0b0b, #1a1a1a);
    color: white;
}

header {
    text-align: center;
    padding: 25px;
    font-size: 34px;
    font-weight: bold;
    color: #5865F2;
}

nav {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    background: #111;
    padding: 12px;
}

nav button {
    background: #5865F2;
    border: none;
    padding: 10px 14px;
    color: white;
    cursor: pointer;
    border-radius: 6px;
    font-weight: bold;
    transition: 0.2s;
}

nav button:hover {
    transform: scale(1.05);
    background: #4752c4;
}

.container {
    max-width: 900px;
    margin: auto;
    padding: 20px;
}

.card {
    background: #1c1c1c;
    padding: 20px;
    margin-top: 15px;
    border-radius: 10px;
    border-left: 4px solid #5865F2;
}

.hidden { display: none; }

.status {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    background: green;
    font-weight: bold;
}

.offline { background: red; }

button.action {
    margin-top: 10px;
    background: #5865F2;
    border: none;
    padding: 10px;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

.footer {
    text-align: center;
    padding: 20px;
    color: gray;
    margin-top: 30px;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.7);
}

.modal-content {
    background: #1c1c1c;
    width: 90%;
    max-width: 500px;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
}

textarea {
    height: 100px;
    resize: none;
}
</style>
</head>

<body>

<header>NeXus Roleplay</header>

<nav>
<button onclick="show('home')">Início</button>
<button onclick="show('regras')">Regras</button>
<button onclick="show('updates')">Atualizações</button>
<button onclick="openModal()">Denunciar</button>
<button onclick="copyIP()">Copiar IP</button>
<button onclick="window.open('https://discord.gg/', '_blank')">Discord</button>
</nav>

<div class="container">

<!-- HOME -->
<div id="home" class="card">
<h2>Bem-vindo ao NeXus Roleplay</h2>
<p>Servidor SA-MP em desenvolvimento com sistema profissional de roleplay.</p>

<p><b>Status do servidor:</b> 
<span class="status">ONLINE</span>
</p>

<button class="action" onclick="copyIP()">Copiar IP do Servidor</button>
</div>

<!-- REGRAS -->
<div id="regras" class="card hidden">
<h2>📜 Regras</h2>
<p>• Proibido DM / RK / VDM</p>
<p>• Respeite todos os jogadores</p>
<p>• Proibido hacks ou mods ilegais</p>
<p>• Jogue sempre em RP</p>
<p>• Bugs devem ser reportados</p>
</div>

<!-- UPDATES -->
<div id="updates" class="card hidden">
<h2>🔄 Atualizações</h2>
<p>✔ Site criado</p>
<p>✔ Sistema base pronto</p>
<p>⏳ Sistema de empregos em desenvolvimento</p>
<p>⏳ Economia sendo configurada</p>
</div>

</div>

<!-- MODAL DENUNCIA -->
<div id="modal" class="modal">
<div class="modal-content">
<h2>Denunciar Jogador</h2>

<input type="text" id="nome" placeholder="Seu nome">
<input type="text" id="acusado" placeholder="Nome do acusado">
<textarea id="motivo" placeholder="Motivo da denúncia"></textarea>

<button class="action" onclick="enviar()">Enviar denúncia</button>
<button class="action" onclick="closeModal()" style="background:red;">Fechar</button>
</div>
</div>

<div class="footer">
© 2026 NeXus Roleplay
</div>

<script>
function show(page){
    document.querySelectorAll('.card').forEach(c => c.classList.add('hidden'));
    document.getElementById(page).classList.remove('hidden');
}

function copyIP(){
    navigator.clipboard.writeText("Em breve");
    alert("IP copiado!");
}

function openModal(){
    document.getElementById("modal").style.display = "block";
}

function closeModal(){
    document.getElementById("modal").style.display = "none";
}

function enviar(){
    let nome = document.getElementById("nome").value;
    let acusado = document.getElementById("acusado").value;
    let motivo = document.getElementById("motivo").value;

    if(nome && acusado && motivo){
        alert("Denúncia enviada com sucesso!");
        closeModal();
    } else {
        alert("Preencha todos os campos!");
    }
}
</script>

</body>
</html>

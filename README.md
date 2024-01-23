<!DOCTYPE html>
<html>
<head>
    <title>ADM</title>
    <script src="videos.js"></script>
</head>
<body>
    <h1>Gerenciador de Vídeos</h1>
    <input type="text" id="video-link" placeholder="Cole o link do vídeo do YouTube">
    <button onclick="adicionarVideo()">Adicionar</button>
    <ul id="lista-videos"></ul>

    <script>
        // Função para carregar a lista de vídeos do armazenamento local
        function carregarListaVideos() {
            var lista = JSON.parse(localStorage.getItem('listaVideos')) || [];
            return lista;
        }

        // Função para salvar a lista de vídeos no armazenamento local
        function salvarListaVideos(lista) {
            localStorage.setItem('listaVideos', JSON.stringify(lista));
        }

        // Inicializar a lista de vídeos
        var listaVideos = carregarListaVideos();

        function adicionarVideo() {
            var link = document.getElementById('video-link').value;
            if (link) {
                listaVideos.push(link);
                salvarListaVideos(listaVideos);
                exibirLista();
                document.getElementById('video-link').value = '';
            }
        }

        function exibirLista() {
            var lista = document.getElementById('lista-videos');
            lista.innerHTML = '';

            listaVideos.forEach(function (video, index) {
                var itemLista = document.createElement('li');
                itemLista.innerHTML = `
                    <a href="${video}" target="_blank">${video}</a>
                    <button onclick="excluirVideo(${index})">Excluir</button>
                `;
                lista.appendChild(itemLista);
            });
        }

        function excluirVideo(index) {
            if (index >= 0 && index < listaVideos.length) {
                listaVideos.splice(index, 1);
                salvarListaVideos(listaVideos);
                exibirLista();
            }
        }

        exibirLista();
    </script>
</body>
</html>

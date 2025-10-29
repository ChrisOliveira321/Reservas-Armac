<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Armac - Sistema')</title>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS custom -->
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/formulario.css">
    <link rel="stylesheet" href="/css/tabela.css">
    <link rel="stylesheet" href="/css/footer.css"> <!-- adiciona o CSS do rodapé -->
</head>
    <!-- Faixa azul superior -->
    <div class="topbar">
        <div class="container">
            <div class="left">
                <span class="phone">
                    <img src="{{ asset('images/armacazul.jpg') }}" alt="ArmacAzul" class="icon-phone">
                    0800 942 4090
                </span>
            </div>
            <div class="right">
                <a href="#">Venda de seminovos</a>
                <a href="#">Trabalhe conosco</a>
                <a href="#">Relações com investidores</a>
            </div>
        </div>
    </div>

    <!-- Cabeçalho principal -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/armac.png') }}" alt="Logo Armac">
            </div>

            <nav class="menu">
                <ul>
                    <li><a href="#" class="active">HOME</a></li>
                    <li><a href="#">A ARMAC</a></li>
                    <li><a href="#">NOSSOS 30 ANOS</a></li>
                    <li><a href="#">EQUIPAMENTOS</a></li>
                    <li><a href="#">SEGMENTOS</a></li>
                    <li><a href="#">BLOG</a></li>
                    <li><a href="#">NOTÍCIAS</a></li>
                    <li><a href="#">CONTATO</a></li>
                    <li>
                        <a href="#" class="orcamento">
                            ORÇAMENTO <span class="badge">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main>
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Links principais -->
            <nav class="footer-links">
                <a href="#">HOME</a>
                <a href="#">A ARMAC</a>
                <a href="#">EQUIPAMENTOS</a>
                <a href="#">ORÇAMENTO</a>
                <a href="#">VENDA DE SEMINOVOS</a>
                <a href="#">BLOG</a>
                <a href="#">CONTATO</a>
                <a href="#">TRABALHE CONOSCO</a>
                <a href="#">RELAÇÕES COM INVESTIDORES</a>
            </nav>

            <!-- Endereço -->
            <div class="footer-address">
                <p>Av. Marcos Penteado de Ulhôa Rodrigues, 939 Edifício Jatobá, 7º andar Tamboré, Barueri - SP, 06460-040</p>
            </div>

            <!-- Redes sociais -->
            <div class="footer-social">
                <a href="#"><img src="{{ asset('images/facebook.svg') }}"></a>
                <a href="#"><img src="{{ asset('images/youtube.svg') }}"></a>
                <a href="#"><img src="{{ asset('images/linkedIn.svg') }}"></a>
                <a href="#"><img src="{{ asset('images/instagram.svg') }}"></a>
                <a href="#"><img src="{{ asset('images/tiktok.svg') }}"></a>
            </div>

            <!-- Copyright -->
            <p class="footer-copy">© 2025 Armac.</p>
        </div>
    </footer>
    @yield('scripts')
</body>
</html>
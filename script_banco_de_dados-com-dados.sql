-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para nettoblog
CREATE DATABASE IF NOT EXISTS `nettoblog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nettoblog`;

-- Copiando estrutura para tabela nettoblog.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `statusRegistro` int(11) NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.categoria: ~5 rows (aproximadamente)
INSERT IGNORE INTO `categoria` (`id`, `descricao`, `statusRegistro`) VALUES
	(1, 'Esportes', 1),
	(2, 'Turismo', 2),
	(4, 'Politica', 1),
	(5, 'Vestuário', 1),
	(9, 'Viagens', 1),
	(10, 'Tecnologia', 1);

-- Copiando estrutura para tabela nettoblog.noticia
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `texto` text NOT NULL,
  `statusRegistro` int(11) NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  `imagem` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL,
  `qtdVisualizacao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_noticia_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_noticia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.noticia: ~5 rows (aproximadamente)
INSERT IGNORE INTO `noticia` (`id`, `titulo`, `texto`, `statusRegistro`, `imagem`, `created_at`, `usuario_id`, `qtdVisualizacao`) VALUES
	(15, 'Dados pessoais de milhões de brasileiros estão à venda', '<p>Uma nova leva de dados pessoais de milhões de brasileiros está à venda na <strong>“deep web”</strong>, como é chamado o submundo da internet. De acordo com o sistema de monitoramento de ameaças da ISH Tech, especializada em cibersegurança, acaba de ser colocada à venda por US$ 600 uma base com informações de dois milhões de servidores públicos, do Siape (Sistema Integrado de Administração de Pessoal), ferramenta que processa o pagamento de servidores ativos, aposentados e pensionistas.</p><p>Além de documentos, a lista traz dados bancários e até a renda dos servidores. Também foi encontrado para venda um arquivo com mais de 600 gigabytes provenientes do Serviço de Proteção ao Crédito (SPC). Junto aos nomes dos cadastrados no serviço, a lista traz informações como número de telefone e endereço. O preço: US$ 650. O pagamento, como sempre nesses casos, é feito em bitcoins.</p>', 1, '610101408_netto-1.png', '2022-06-12 17:59:10', 5, 6),
	(16, 'Lançado em Muriaé o livro “Uma reflexão por dia”', '<p>Foi realizado em Muriaé na noite desta terça-feira (14), no Teatro Zaccaria Marques, o lançamento do livro ‘Uma reflexão por dia”, de Hermes Luppi. O escritor recebeu amigos,&nbsp;familiares e profissionais ligados à literatura para uma noite de autógrafos e apresentação do livro. A obra é composta de 366 pensamentos, orações, signos zodiacais.</p><p>O&nbsp;lançamento é incentivado pela Prefeitura de Muriaé, por meio da Fundarte, e o objetivo da obra é conduzir as pessoas a meditação, buscando o desenvolvimento espiritual.</p><p>“Neste exemplar, buscamos o pensamento do dia – uma mensagem, um conselho. As linhas de raciocínio são sabedoria e conhecimento. Os leitores podem abrir a página e&nbsp;refletir”, disse o autor, informando ainda que a capa tem símbolos do tarô e nas páginas interiores, são ressaltados alguns momentos com Jesus Cristo e reflexões&nbsp;sobre as leis divinas.</p><p>Hermes Luppi nasceu em Castelfranco Emília, na Itália, e tem nacionalidade brasileira. É doutor em Ciências Econômicas pela Universidade Federal do Rio de Janeiro (UFRJ),&nbsp;cursou Licenciatura Plena em Língua Portuguesa e Inglesa e lecionou, por anos, a disciplina de inglês através da 23ª SRE-Muriaé. Luppi também foi funcionário do Setor de&nbsp;Patrimônio da Prefeitura Municipal de Muriaé.<br>&nbsp;</p>', 1, '13154890_livro.png', '2022-06-15 15:32:03', 7, 18),
	(17, 'Estudantes de escola da zona rural de Muriaé vão ao ES e RJ ', '<p>Em comemoração aos 50 anos da Semana Nacional do Meio Ambiente, a Escola Estadual Capitão Roberto José Ferreira, do distrito de Macuco, realizou duas aulas de campo e os alunos, dos ensinos fundamental e médio, se encantaram com a natureza vista de perto.</p><p>Para conscientizar os estudantes sobre a importância da data, os professores programaram duas viagens e os alunos tiveram a oportunidade de conhecer o maior zoológico do Brasil, o Zoo Park da Montanha, em Marechal Floriano, no Espírito Santo, que conta com cerca de 1.200 animais e 180 espécies. O zoológico conserva grandes felinos, aves exóticas e primatas.</p><p>Já na primeira semana de junho, os professores levaram os alunos para mais uma atividade extraclasse, e dessa vez no Rio de Janeiro. Na capital carioca, eles visitaram vários pontos turísticos de grande valor histórico e cultural, como o AquaRio, o maior aquário marinho da América do Sul, o Parque Quinta da Boa Vista, um grande complexo paisagístico, e o Museu do Amanhã, que apresentava uma exposição sobre a Amazônia.<br>&nbsp;</p>', 1, '2109690799_viagem.png', '2022-06-15 15:36:40', 7, 14),
	(18, 'Mineiro Sub-20: Nacional é goleado pelo Cruzeiro por 5 a 2 ', '<p>Na abertura da sexta rodada da primeira fase do Campeonato Mineiro sub-20, o Nacional foi goleado pelo Cruzeiro por 5 a 2 no estádio Soares de Azevedo, na manhã desta quarta-feira (15). Marcelinho (2), Arielson, Jhosefer e Keven marcaram os gols da equipe da capital. Yuri e Renam fizeram os gols do NAC.</p><p>Com o resultado o Cruzeiro assumiu a liderança da competição, agora com 14 pontos ganhos. O Nacional continua na 5ª posição com 10 pontos, mas pode ser ultrapassado ao término da rodada.</p><p>A equipe de Muriaé terá mais um grande clube de Belo Horizonte na próxima rodada. Depois de Cruzeiro e Atlético, o duelo agora será diante do América Mineiro. O jogo acontece domingo, dia 3 de julho, às 16h, em Belo Horizonte.</p>', 1, '46004850_nacional.png', '2022-06-16 14:34:53', 7, 17),
	(20, 'Fim do Internet Explorer: navegador será descontinuado', '<p>Após quase 27 anos de existência, o Internet Explorer será oficialmente descontinuado nesta quarta-feira (15). A partir desta data, o IE 11, última versão do navegador, deixará de ter suporte no Windows 10 . Ao clicarem nos atalhos do navegador, os usuários serão direcionados ao Microsoft Edge, atual browser padrão do Windows 11 que usa o mesmo motor do Google Chrome. Vale lembrar que a Microsoft anunciou o fim do navegador em maio do ano passado. Antes disso, porém, as aplicações online do Office 365 já haviam parado de funcionar no Internet Explorer.</p><p>A principal justificativa da empresa para encerrar o Internet Explorer é oferecer uma melhor experiência de uso com o Edge e disponibilizar uma plataforma compatível com sites e aplicações modernas. Isso inclui a segurança de navegação, já que o browser lançado em 2015 oferece maior proteção contra ataques de phishing e malware.</p><p>Segundo a própria companhia, o Microsoft Edge também é mais rápido para corrigir vulnerabilidades. O navegador do Windows 11 consegue entregar patches de segurança em dias, ou até mesmo horas, enquanto o Internet Explorer 11 entrega as atualizações mensalmente.</p>', 1, '1336249395_ie.png', '2022-06-16 23:29:45', 5, 1);

-- Copiando estrutura para tabela nettoblog.noticiacategoria
CREATE TABLE IF NOT EXISTS `noticiacategoria` (
  `noticia_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`noticia_id`,`categoria_id`),
  KEY `fk_noticia_has_categoria_categoria1_idx` (`categoria_id`),
  KEY `fk_noticia_has_categoria_noticia_idx` (`noticia_id`),
  CONSTRAINT `fk_noticia_has_categoria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticia_has_categoria_noticia` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.noticiacategoria: ~6 rows (aproximadamente)
INSERT IGNORE INTO `noticiacategoria` (`noticia_id`, `categoria_id`) VALUES
	(18, 1),
	(17, 2),
	(16, 9),
	(17, 9),
	(15, 10),
	(20, 10);

-- Copiando estrutura para tabela nettoblog.noticiacomentario
CREATE TABLE IF NOT EXISTS `noticiacomentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`noticia_id`),
  KEY `fk_noticiacomentario_usuario1_idx` (`usuario_id`),
  KEY `fk_noticiacomentario_noticia1_idx` (`noticia_id`),
  CONSTRAINT `fk_noticiacomentario_noticia1` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticiacomentario_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.noticiacomentario: ~6 rows (aproximadamente)
INSERT IGNORE INTO `noticiacomentario` (`id`, `usuario_id`, `noticia_id`, `texto`, `created_at`) VALUES
	(1, 7, 18, 'Primeiro registro de comentário', '2022-06-16 20:56:12'),
	(2, 7, 18, 'Registrando o segundo teste de comentário', '2022-06-16 20:58:35'),
	(3, 7, 18, 'Terceiro comentário', '2022-06-16 21:01:34'),
	(4, 5, 18, 'Testando comentário com outro usuário', '2022-06-16 21:25:08'),
	(5, 5, 16, 'Achei o bug no require_once', '2022-06-16 21:30:50'),
	(6, 5, 15, 'Testando exibição de quantidade de comentários', '2022-06-16 21:49:54');

-- Copiando estrutura para tabela nettoblog.noticialida
CREATE TABLE IF NOT EXISTS `noticialida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_noticialida_usuario1_idx` (`usuario_id`),
  KEY `fk_noticialida_noticia1_idx` (`noticia_id`),
  CONSTRAINT `fk_noticialida_noticia1` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticialida_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.noticialida: ~1 rows (aproximadamente)
INSERT IGNORE INTO `noticialida` (`id`, `usuario_id`, `noticia_id`, `created_at`) VALUES
	(20, 7, 20, '2022-06-17 01:30:34');

-- Copiando estrutura para tabela nettoblog.sobreoautor
CREATE TABLE IF NOT EXISTS `sobreoautor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `statusRegistro` int(11) NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  `linkFacebook` varchar(100) DEFAULT NULL,
  `linkInstagram` varchar(100) DEFAULT NULL,
  `linkTwitter` varchar(100) DEFAULT NULL,
  `linkLinkedin` varchar(100) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.sobreoautor: ~1 rows (aproximadamente)
INSERT IGNORE INTO `sobreoautor` (`id`, `nome`, `cargo`, `texto`, `statusRegistro`, `linkFacebook`, `linkInstagram`, `linkTwitter`, `linkLinkedin`, `foto`) VALUES
	(3, 'Aldecir de Almeida Fonseca', 'Escritor sênior do blog', '<p>Para quem realmente precisa saber, <strong>Aldecir de Almeida Fonseca</strong> nasceu em São Paulo-SP, Brasil, em 1977. Viveu sua infância e junventude na atribulada capital paulista. Foi acessar de imprensa e jornalista de algumas autoridades e grandes companhias. Em sua busca por uma vida mais tranquila se mudou para Muriaé, uma pequena cidade do interior de Minas Gerais. Hoje escritor em tempo integral, vive com mulher e seu casal de filhos. Apreciador de um bom vinho e uma boa cerveja e assim como todo Brasileiro é apaixonado por um churrasco.</p>', 1, 'facebook/mauricionetto', 'instagram/mauricionetto', 'twitter/mauricionetto', 'linkedin/mauricionetto', '2073557916_programador.png');

-- Copiando estrutura para tabela nettoblog.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '11' COMMENT '1=Administrador; 11=Visitante;',
  `statusRegistro` int(11) NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela nettoblog.usuario: ~2 rows (aproximadamente)
INSERT IGNORE INTO `usuario` (`id`, `nome`, `email`, `senha`, `nivel`, `statusRegistro`) VALUES
	(5, 'administrador', 'administrador@nettoblog.com.br', '$2y$10$z2zZZgaEIiMGNqUdjvbrsOzv6FOFVkn1m8JCf94NZQmu4qO1BPvda', 1, 1),
	(6, 'teste', 'teste@teste.com.br', '$2y$10$EpPrTCGWqM7C4LSNJrRGgOqaKd3e/abE.8WLNuWwrLogau/worCoe', 11, 2),
	(7, 'Aldecir Fonseca', 'aldecirfonseca@gmail.com', '$2y$10$z2zZZgaEIiMGNqUdjvbrsOzv6FOFVkn1m8JCf94NZQmu4qO1BPvda', 11, 1);

-- Copiando estrutura para tabela nettoblog.usuariorecuperasenha
CREATE TABLE IF NOT EXISTS `usuariorecuperasenha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `chave` varchar(250) NOT NULL,
  `statusRegistro` int(11) NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK1_usuariorecuperacaosenha` (`usuario_id`),
  CONSTRAINT `FK1_usuariorecuperacaosenha` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela nettoblog.usuariorecuperasenha: ~14 rows (aproximadamente)
INSERT IGNORE INTO `usuariorecuperasenha` (`id`, `usuario_id`, `chave`, `statusRegistro`, `created_at`) VALUES
	(1, 7, '24f9393f3e2317568714338334c6d691cea585e1', 2, '2022-06-05 07:59:30'),
	(2, 7, '24f9393f3e2317568714338334c6d691cea585e1', 2, '2022-06-05 08:09:44'),
	(3, 7, '426f74c506cd7209fa7f352de00166e12693da8c', 2, '2022-06-05 08:11:42'),
	(4, 7, '09bbf0d9b9d5d784a402f68b1e5f98678201f483', 2, '2022-06-05 08:13:16'),
	(5, 7, 'c146fefdfbf2a87270668991356a3d80335dba81', 2, '2022-06-05 08:34:36'),
	(6, 7, 'b7c1605a070a38a88a14f139dba5c34351b29245', 2, '2022-06-05 08:44:48'),
	(7, 7, '80c1e6a0701a0efb5f0bd3c02836f8645495d466', 2, '2022-06-05 09:51:18'),
	(8, 7, '898496296a2817d272070501dd7ac3fe77a5b3af', 2, '2022-06-05 10:45:41'),
	(9, 7, 'a5ae16c18fee4c04641053e91e15dbfbeb332120', 2, '2022-06-05 11:00:03'),
	(10, 7, '6ce840dcb01375472b1badd68023d3e96b422f58', 2, '2022-06-05 11:01:29'),
	(11, 7, 'dbee7a6035c6c2092f2d85f18d1bf27ba33586e5', 2, '2022-06-05 11:42:36'),
	(12, 7, '8c8319b8fc12fa11a8ee591982646a69f70de008', 2, '2022-06-05 12:38:14'),
	(13, 7, '9b97768d9bf806bc6693de5aeb018fd4b1f12589', 2, '2022-06-05 12:43:40'),
	(14, 7, 'fc82cdd899d273de7afab319cc1eec331463614c', 2, '2022-06-06 19:02:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

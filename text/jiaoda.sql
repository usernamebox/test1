-- phpMyAdmin SQL Dump
-- version 2.9.2-rc1
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2008 年 03 月 11 日 14:01
-- 服务器版本: 5.0.27
-- PHP 版本: 5.2.1
-- 
-- 数据库: `jiaoda`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `about`
-- 

CREATE TABLE `about` (
  `id` int(11) NOT NULL auto_increment,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `about`
-- 

INSERT INTO `about` (`id`, `content`) VALUES 
(1, '<P>sfddsfsdfsdfsdf</P>\r\n<P><IMG src="/new/uploadfile/200703/20070323125619181.jpg" border=0></P>'),
(2, '<P><SPAN style="FONT-SIZE: 10.5pt; FONT-FAMILY: ????; mso-bidi-font-size: 12.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA">contact us!</SPAN></P>');

-- --------------------------------------------------------

-- 
-- 表的结构 `active`
-- 

CREATE TABLE `active` (
  `id` int(11) NOT NULL auto_increment,
  `cat` tinyint(3) default '1',
  `title` varchar(150) NOT NULL,
  `author` varchar(50) default NULL,
  `ntime` varchar(20) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  `content` mediumtext,
  `istop` tinyint(3) default '0',
  `photo` varchar(255) default NULL,
  `show` varchar(50) default NULL,
  `times` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=23 ;

-- 
-- 导出表中的数据 `active`
-- 

INSERT INTO `active` (`id`, `cat`, `title`, `author`, `ntime`, `hits`, `content`, `istop`, `photo`, `show`, `times`) VALUES 
(6, 2, 'duihua1', 'admin', '07/03/27', 0, '<P>duihua</P>\r\n<P>duihua</P>\r\n<P>duihuaduihuaduihua11</P>', 0, '20070327142333451.jpg', '', 0),
(7, 2, 'duihua2', 'admin', '07/03/27', 1, '<P>duihuaduihuaduihuaduihua</P>\r\n<P>duihuaduihuaduihua34</P>', 0, '', NULL, 0),
(13, 1, '课件制作系统简介', '', '08/03/04', 0, '采用此课件录编播系统制作和录制的课件不仅支持PowerPoint，Flash动画，HTML文件格式，同时还可将老师授课屏幕和电子白板实时捕获，配以视频和音频信息，形成同步多媒体教学课件，课件以每个章节为同步播放的起始点，可编辑生成三层目录，避免了传统浏览多媒体课件时必须从头至尾播放的弊端，极大地节省时间，提高学习效率，并且界面操作简单、学习方式灵活、予人印象深刻。', 0, '', '', 0),
(14, 1, '为沉稳而痴狂', '', '08/03/05', 0, '<U>为沉稳而痴狂</U><A href="http://blog.cersp.com/18276/1071502.aspx" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0),
(15, 1, '两个开门红――初一英语教学关键', '', '08/03/05', 0, '<U>两个开门红――初一英语教学关键</U><A href="http://blog.cersp.com/16602/1075652.aspx" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0),
(16, 1, '内外有别巧解题', '', '08/03/05', 0, '内外有别巧解题', 0, '', '', 0),
(17, 1, '文革时期中小学教科书摘选', '', '08/03/05', 0, '<U>文革时期中小学教科书摘选</U><A href="http://blog.cersp.com/16604/1074790.aspx" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0),
(18, 1, '我们是在抚养小孩，不是在养花', '', '08/03/05', 0, '我们是在抚养小孩，不是在养花', 0, '', '', 0),
(19, 1, '构建轻松又有成效的美术课堂', '', '08/03/05', 0, '<U>构建轻松又有成效的美术课堂</U><A href="http://blog.cersp.com/19331/1075476.aspx" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0),
(20, 1, '更新美术教育观念改变美术教学', '', '08/03/05', 2, '更新美术教育观念改变美术教学', 0, '', '', 0),
(21, 1, '给学生营造一个自由创作的舞台', '', '08/03/05', 2, '给学生营造一个自由创作的舞台', 0, '', '', 0),
(22, 1, '小学美术教学方式改革初探', '', '08/03/05', 3, '<U>小学美术教学方式改革初探</U><A href="http://blog.cersp.com/19331/1015185.aspx" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `admin`
-- 

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL auto_increment,
  `user` varchar(10) NOT NULL,
  `pass` varchar(15) NOT NULL,
  PRIMARY KEY  (`uid`),
  FULLTEXT KEY `pass` (`pass`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `admin`
-- 

INSERT INTO `admin` (`uid`, `user`, `pass`) VALUES 
(1, 'admin', 'admin');

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs`
-- 

CREATE TABLE `bbs` (
  `id` int(11) NOT NULL auto_increment,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `bbs`
-- 

INSERT INTO `bbs` (`id`, `content`) VALUES 
(1, '<p><strong>sdfsdfdsfsd</strong></p>\r\n<p><strong><em>fgfdgdfgdg</em></strong></p>\r\n<p><img src="http://localhost/new/images/02.gif" alt="" /></p>');

-- --------------------------------------------------------

-- 
-- 表的结构 `board`
-- 

CREATE TABLE `board` (
  `id` int(11) NOT NULL auto_increment,
  `catname` varchar(50) NOT NULL,
  `boardmaster` varchar(150) default NULL,
  `readme` varchar(255) default NULL,
  `setting1` tinyint(3) default '0',
  `setting2` tinyint(3) default '0',
  `topicnum` tinyint(3) default '0',
  `totaltopic` tinyint(3) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `board`
-- 

INSERT INTO `board` (`id`, `catname`, `boardmaster`, `readme`, `setting1`, `setting2`, `topicnum`, `totaltopic`) VALUES 
(1, '教师专区', 'test', '教师专区', 1, 0, 5, 20),
(2, '学生专区', 'test', '学生专区', 1, 0, 8, 15),
(3, '普通浏览者', 'test', '普通浏览者', 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `book`
-- 

CREATE TABLE `book` (
  `id` int(11) NOT NULL auto_increment,
  `yname` varchar(10) NOT NULL,
  `tel` varchar(15) default NULL,
  `email` varchar(30) default NULL,
  `ip` varchar(20) default NULL,
  `title` varchar(150) NOT NULL,
  `content` mediumtext,
  `utime` varchar(30) default NULL,
  `hidden` tinyint(3) default '0',
  `review` mediumtext,
  `rtime` varchar(30) default NULL,
  `islock` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `book`
-- 

INSERT INTO `book` (`id`, `yname`, `tel`, `email`, `ip`, `title`, `content`, `utime`, `hidden`, `review`, `rtime`, `islock`) VALUES 
(1, '?ú??????', '021-12345678', 'admin@admin.com', '127.0.0.1', 'title', '·高二(上)数学获奖精品课件集1', '2007-03-26 13:52:41', 1, '·高二(上)数学获奖精品课件集1', '2007-03-26 13:56:41', 1),
(2, 'test', '', 'admin@admin.com', '127.0.0.1', 'test', 'test<br />\r\ntest<br />\r\ntest<br />\r\ntest<br />\r\ntest<br />\r\ntest<br />\r\ntest<br />\r\ntest<br />\r\ntest', '2007-03-26 14:04:16', 0, NULL, NULL, 1),
(3, 'test1', '', 'admin@admin.com', '127.0.0.1', 'test1', 'test1<br />\r\ntest1<br />\r\ntest1<br />\r\ntest1<br />\r\ntest1<br />\r\ntest1', '2007-03-26 14:04:48', 0, NULL, NULL, 0),
(4, 'dgdfgdfg', '', 'admin@admin.com', '127.0.0.1', 'fdgfdg', 'dfgfd<br />\r\ndgdfg<br />\r\ndfg  dfgdfg<br />\r\ndfgdfgfd', '2007-03-26 14:16:34', 0, 'review<br />\r\nreview<br />\r\nreview<br />\r\nreview<br />\r\nreview', '2007-03-26 15:49:03', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `download`
-- 

CREATE TABLE `download` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `download`
-- 

INSERT INTO `download` (`id`, `title`, `url`) VALUES 
(4, '123456', './upfiles/20080304174513340.rar'),
(5, '123', './upfiles/20080305052737667.mp3'),
(6, '555555', './upfiles/20080305054643970.mp3'),
(7, '梦想', './upfiles/20080305054714427.rar'),
(8, '5555555666666', './upfiles/20080305085622760.mp3'),
(9, '99999', './upfiles/20080305085642569.rar'),
(10, '我的梦想', './upfiles/20080305091912690.mp3'),
(11, 'rrr123', './upfiles/20080305091941948.rar'),
(12, 'qqq123', './upfiles/20080305093916363.mp3'),
(13, 'qqq123qqq123', './upfiles/20080305093930759.rar');

-- --------------------------------------------------------

-- 
-- 表的结构 `flavor`
-- 

CREATE TABLE `flavor` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(150) NOT NULL,
  `author` varchar(50) default NULL,
  `keywords` varchar(50) default NULL,
  `ntime` varchar(20) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  `content` mediumtext,
  `istop` tinyint(3) default '0',
  `photo` varchar(255) default NULL,
  `show` varchar(50) default NULL,
  `times` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=19 ;

-- 
-- 导出表中的数据 `flavor`
-- 

INSERT INTO `flavor` (`id`, `title`, `author`, `keywords`, `ntime`, `hits`, `content`, `istop`, `photo`, `show`, `times`) VALUES 
(14, '高一(下)数学获奖精品课件集6', '', '', '08/03/05', 0, '高一(下)数学获奖精品课件集6', 0, '', '', 0),
(13, '高一(下)数学获奖精品课件集5', '', '', '08/03/05', 1, '高一(下)数学获奖精品课件集5', 0, '', '', 0),
(12, '高一(下)数学获奖精品课件集4', '', '', '08/03/05', 0, '高一(下)数学获奖精品课件集4', 0, '', '', 0),
(11, '高一(下)数学获奖精品课件集3', '', '', '08/03/05', 0, '高一(下)数学获奖精品课件集3', 0, '', '', 0),
(10, '高一(下)数学获奖精品课件集2', '', '', '08/03/05', 0, '高一(下)数学获奖精品课件集2', 0, '', '', 0),
(9, '高一(下)数学获奖精品课件集1', '', '', '08/03/05', 0, '高一(下)数学获奖精品课件集1', 0, '', '', 0),
(15, '高一(下)数学获奖精品课件集7', '', '', '08/03/05', 1, '高一(下)数学获奖精品课件集7', 0, '', '', 0),
(16, '高一(下)数学获奖精品课件集8', '', '', '08/03/05', 2, '高一(下)数学获奖精品课件集8', 0, '', '', 0),
(17, '高一(下)数学获奖精品课件集9', '', '', '08/03/05', 2, '高一(下)数学获奖精品课件集9', 0, '', '', 0),
(18, '高一(下)数学获奖精品课件集10', '', '', '08/03/05', 5, '高一(下)数学获奖精品课件集10', 0, '', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `inheritance`
-- 

CREATE TABLE `inheritance` (
  `id` int(11) NOT NULL auto_increment,
  `cat` tinyint(3) default '1',
  `title` varchar(150) NOT NULL,
  `author` varchar(50) default NULL,
  `ntime` varchar(20) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  `content` mediumtext,
  `istop` tinyint(3) default '0',
  `photo` varchar(255) default NULL,
  `show` varchar(50) default NULL,
  `times` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=18 ;

-- 
-- 导出表中的数据 `inheritance`
-- 

INSERT INTO `inheritance` (`id`, `cat`, `title`, `author`, `ntime`, `hits`, `content`, `istop`, `photo`, `show`, `times`) VALUES 
(7, 1, '课程的性质、目的和任务', '', '08/03/05', 0, '<FONT size=3>&nbsp;<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">模糊数学是一门为扩宽研究生理论与技术知识的理论基础选修课程。开设本课程的目的是为研究生介绍模糊数学基本知识及基本原理、特点和技术应有前景。在扩宽学生知识面的同时，通过上机完成课程大作业，使学生理解模糊数学的优越性。课程教学注重培养学生主动思考和解决问题的能力，为将来从事科研工作打下好的基础。</SPAN></FONT>', 0, '', '', 0),
(8, 1, '课程的主要内容和基本要求', '', '08/03/05', 0, '课程的主要内容和基本要求', 0, '', '', 0),
(9, 1, '第一部分 模糊数学基础', '', '08/03/05', 0, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍模糊数学产生的背景和其发展概况、模糊数学的基本定理、研究对象和主要特点。使学生了解模糊集和隶属函数、模糊关系和模糊矩阵、模糊逻辑，模糊关系方程及其求解。</SPAN><SPAN lang=EN-US style="FONT-SIZE: 12pt; mso-bidi-font-size: 10.0pt"><?xml:namespace prefix = o ns = "urn:schemas-microsoft-com:office:office" /><o:p></o:p></SPAN>', 0, '', '', 0),
(10, 1, '第二部分 模糊决策', '', '08/03/05', 0, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍模糊决策模型的建立方法，使学生了解模糊综合评判、多层次模糊评判的基本原理，通过实例介绍模糊评判模型的实际应用。</SPAN><SPAN lang=EN-US style="FONT-SIZE: 12pt; mso-bidi-font-size: 10.0pt"><?xml:namespace prefix = o ns = "urn:schemas-microsoft-com:office:office" /><o:p></o:p></SPAN>', 0, '', '', 0),
(11, 1, '第三部分 模糊聚类分析', '', '08/03/05', 6, '介绍模糊聚类分析的基本原理和方法，通过和实例分析使学生掌握模糊聚类分类器的设计方法。 \r\n<P><B>第四部分</B><B> </B><B>模糊推理：</B>介绍模糊矩阵推理的几种类型和基本方法。</P>', 0, '', '', 0),
(12, 1, '第五部分 模糊控制系统的可靠性', '', '08/03/05', 1, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍模糊可靠性的计算公式及模糊可靠性设计的应用实例。</SPAN>', 0, '', '', 0),
(13, 1, '第六部分 模糊控制系统的稳定性', '', '08/03/05', 4, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍模糊控制系统的稳定性分析方法，掌握提高模糊控制系统稳定性的几种途径，如模糊</SPAN><SPAN lang=EN-US style="FONT-SIZE: 12pt; mso-bidi-font-size: 10.0pt">-PID</SPAN><SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">复合控制、参数自整定模糊控制等。</SPAN><B style="mso-bidi-font-weight: normal"><SPAN lang=EN-US style="FONT-SIZE: 12pt; mso-bidi-font-size: 10.0pt"><?xml:namespace prefix = o ns = "urn:schemas-microsoft-com:office:office" /><o:p></o:p></SPAN></B>', 0, '', '', 0),
(14, 1, '第七部分 模糊数学在控制中的应用', '', '08/03/05', 2, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍模糊控制理论的产生与发展，目前的应用概况及所面临的问题。要求学生了解基本模糊控制系统的结构、精确量的模糊化、模糊控制算法的设计及输出信息的模糊判决，并介绍几种模糊基函数和模糊推理机制。</SPAN>', 0, '', '', 0),
(15, 1, '第八部分 自适应模糊控制', '', '08/03/05', 0, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍自适应模糊控制的原理和结构，学会建立自校正模糊控制器、模型参考模糊自适应控制和具有连续监督机制的稳定自适应模糊控制器，并掌握自适应模糊控制的几种学习算法。</SPAN><SPAN lang=EN-US style="FONT-SIZE: 12pt; mso-bidi-font-size: 10.0pt"><?xml:namespace prefix = o ns = "urn:schemas-microsoft-com:office:office" /><o:p></o:p></SPAN>', 0, '', '', 0),
(16, 1, '第九部分 模糊控制新进展及其应用', '', '08/03/05', 11, '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: 宋体; mso-bidi-font-size: 10.0pt; mso-ascii-font-family: ''Times New Roman''; mso-hansi-font-family: ''Times New Roman''">介绍专家模糊控制、神经模糊控制和多变量模糊控制技术，以模糊控制在交流伺服系统中的应用为例，介绍一个实际模糊控制系统的设计和实现方法。</SPAN><SPAN lang=EN-US style="FONT-SIZE: 12pt; mso-bidi-font-size: 10.0pt"><?xml:namespace prefix = o ns = "urn:schemas-microsoft-com:office:office" /><o:p></o:p></SPAN>', 0, '', '', 0),
(17, 1, '三、学时分配', '', '08/03/05', 0, '<P><B></B></P>\r\n<TABLE cellSpacing=0 cellPadding=0 border=1>\r\n<TBODY>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 教学环节</P>\r\n<P>&nbsp;&nbsp;&nbsp; 教学时数</P>\r\n<P>&nbsp;</P>\r\n<P>课程内容</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>讲课</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>实验</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>习题课</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>讨论课</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>上机</P></TD>\r\n<TD width=57>\r\n<P align=center>参观或观看录像</P></TD>\r\n<TD vAlign=top width=42>\r\n<P align=center>其他</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>小计</P></TD>\r\n<TD width=60>\r\n<P>备注</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊数学基础</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>4</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>&nbsp;</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>4</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊决策</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>&nbsp;</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊聚类分析</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>&nbsp;</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊推理</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>&nbsp;</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊控制系统可靠性</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>&nbsp;</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊控制系统的稳定性</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>&nbsp;</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊数学在控制中的应用</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>4</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>自适应模糊控制</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>4</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>模糊控制新进展及其应用</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>6</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>2</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>10</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD vAlign=top width=180>\r\n<P>总计</P></TD>\r\n<TD vAlign=top width=36>\r\n<P align=center>20</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>6</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=36>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=34>\r\n<P align=center>6</P></TD>\r\n<TD vAlign=top width=57>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=42>\r\n<P>&nbsp;</P></TD>\r\n<TD vAlign=top width=48>\r\n<P align=center>32</P></TD>\r\n<TD vAlign=top width=60>\r\n<P>&nbsp;</P></TD></TR></TBODY></TABLE>\r\n<P>&nbsp;</P>', 0, '', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `linking`
-- 

CREATE TABLE `linking` (
  `id` int(11) NOT NULL auto_increment,
  `cat` tinyint(3) default '0',
  `title` varchar(150) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `linking`
-- 

INSERT INTO `linking` (`id`, `cat`, `title`, `url`) VALUES 
(1, 0, 'netease', 'http://www.163.com'),
(2, 1, '163', 'http://www.163.com'),
(5, 1, '中国酷网', 'http://www.coov.cn'),
(6, 1, '新浪', 'http://www.sina.com.cn'),
(7, 1, '中国八旗网络', 'http://www.ba7.net.cn'),
(8, 1, '中国万网', 'http://www.net.cn'),
(9, 1, '搜狐', 'http://www.sohu.com'),
(10, 1, '时代互联', 'http://www.now.cn');

-- --------------------------------------------------------

-- 
-- 表的结构 `message`
-- 

CREATE TABLE `message` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(12) NOT NULL,
  `jieshou` varchar(12) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `islook` tinyint(2) NOT NULL default '1',
  `issend` tinyint(2) NOT NULL default '0',
  `addtime` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `message`
-- 

INSERT INTO `message` (`id`, `username`, `jieshou`, `title`, `content`, `islook`, `issend`, `addtime`) VALUES 
(1, 'admin', 'alanliu', 'test', 'testtesttesttest', 0, 0, 'tt'),
(2, 'alanliu', 'admin', 'test1', 'test1test1test1', 0, 0, 'dfgfd'),
(3, 'alanliu', 'all', 'all', 'allallall', 0, 0, 'allall');

-- --------------------------------------------------------

-- 
-- 表的结构 `news`
-- 

CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(150) NOT NULL,
  `author` varchar(50) default NULL,
  `ntime` varchar(20) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  `content` mediumtext,
  `istop` tinyint(3) default '0',
  `photo` varchar(255) default NULL,
  `show` varchar(50) default NULL,
  `times` int(11) default '0',
  `keywords` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `news`
-- 

INSERT INTO `news` (`id`, `title`, `author`, `ntime`, `hits`, `content`, `istop`, `photo`, `show`, `times`, `keywords`) VALUES 
(5, '公文写作', '', '08/03/04', 1, '<U>公文写作</U><A href="http://www.learn.edu.cn/webapps/bbjv-scplugin/tools/guest_content_display.jsp?cid=55&amp;cntid=258" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0, ''),
(3, '普通物理(上)', '', '08/03/04', 1, '<U>普通物理(上)</U><A href="http://www.learn.edu.cn/webapps/bbjv-scplugin/tools/guest_content_display.jsp?cid=284&amp;cntid=1608" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0, ''),
(4, '宏观经济学', '', '08/03/04', 0, '<A href="http://www.learn.edu.cn/webapps/bbjv-scplugin/tools/guest_content_display.jsp?cid=146&amp;cntid=402" target=_blank><FONT color=#0000ff>宏观经济学</FONT></A>', 0, '', '', 0, ''),
(6, '市场营销课程', '', '08/03/04', 1, '<U>市场营销课程</U><A href="http://www.cer.net/html/study_center/index1.htm#7" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0, ''),
(7, '沟通课程', '', '08/03/04', 0, '<U>沟通课程</U><A href="http://www.cer.net/html/study_center/index1.htm#2" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0, ''),
(8, '创业风险投资', '', '08/03/04', 3, '创业风险投资', 0, '', '', 0, ''),
(9, '销售课程', '', '08/03/04', 1, '<U>销售课程</U><A href="http://www.cer.net/html/study_center/index1.htm#9" target=_blank><FONT color=#0000ff></FONT></A>', 0, '', '', 0, '');

-- --------------------------------------------------------

-- 
-- 表的结构 `notice`
-- 

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL auto_increment,
  `title` varchar(150) NOT NULL,
  `author` varchar(50) default NULL,
  `ntime` varchar(20) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  `content` mediumtext,
  `show` varchar(50) default NULL,
  `times` int(11) default '0',
  PRIMARY KEY  (`nid`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=26 ;

-- 
-- 导出表中的数据 `notice`
-- 

INSERT INTO `notice` (`nid`, `title`, `author`, `ntime`, `hits`, `content`, `show`, `times`) VALUES 
(16, '实施方案', '', '08/03/04', 0, '实施方案<A href="http://210.29.88.41/file_post/display/topic.php?TopicCode=1903"><FONT color=#0000ff></FONT></A><BR>', '', 0),
(18, '直播课堂', '', '08/03/04', 3, '直播课堂', '', 0),
(19, 'IP课件', '', '08/03/04', 1, 'IP课件', '', 0),
(20, '新开课程通知', '', '08/03/04', 1, '新开课程通知', '', 0),
(21, '开学通知', '', '08/03/04', 4, '<U>开学通知</U><A href="http://61.142.172.18:8008/Announceview.asp?AnnounceId=109"><FONT size=2></FONT></A>', '', 0),
(24, 'rrr123', '', '08/03/05', 0, 'rrr123', '', 0),
(25, 'qqq123', '', '08/03/05', 0, 'qqq123', '', 0),
(17, '教学辅导', '', '08/03/04', 0, '教学辅导', '', 0),
(14, '教师介绍', '', '08/03/04', 0, '教师介绍', '', 0),
(15, '教学大纲', '', '08/03/04', 0, '教学大纲', '', 0),
(13, '课程说明', '', '08/03/04', 0, '<BR>课程说明', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `review`
-- 

CREATE TABLE `review` (
  `id` int(11) NOT NULL auto_increment,
  `tid` tinyint(3) default '1',
  `title` varchar(150) NOT NULL,
  `username` varchar(15) default NULL,
  `content` mediumtext,
  `addtime` varchar(50) default NULL,
  `edittime` varchar(50) default NULL,
  `ip` varchar(20) default NULL,
  `islock` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=34 ;

-- 
-- 导出表中的数据 `review`
-- 

INSERT INTO `review` (`id`, `tid`, `title`, `username`, `content`, `addtime`, `edittime`, `ip`, `islock`) VALUES 
(21, 9, '·高二(上)数学获奖精品课件集1', 'admin', '·高二(上)数学获奖精品课件集1', '2007-03-30 7:34:28', NULL, '127.0.0.1', 0),
(2, 2, '·高二(上)数学获奖精品课件集2', 'admin', '·高二(上)数学获奖精品课件集2', '2007-03-30 5:09:54', NULL, '127.0.0.1', 0),
(3, 2, '·高二(上)数学获奖精品课件集3', 'admin', '·高二(上)数学获奖精品课件集3', '2007-03-30 5:10:14', NULL, '127.0.0.1', 0),
(4, 2, '·高二(上)数学获奖精品课件集4', 'admin', '·高二(上)数学获奖精品课件集4', '2007-03-30 5:12:05', NULL, '127.0.0.1', 0),
(5, 2, '·高二(上)数学获奖精品课件集5', 'admin', '·高二(上)数学获奖精品课件集5', '2007-03-30 5:13:09', NULL, '127.0.0.1', 0),
(6, 2, '·高二(上)数学获奖精品课件集6', 'admin', '·高二(上)数学获奖精品课件集6', '2007-03-30 5:20:01', NULL, '127.0.0.1', 0),
(7, 2, '·高二(上)数学获奖精品课件集7', 'test', '·高二(上)数学获奖精品课件集7', '2007-03-30 5:46:02', NULL, '127.0.0.1', 0),
(8, 2, '·高二(上)数学获奖精品课件集8', 'test', '·高二(上)数学获奖精品课件集8', '2007-03-30 5:46:38', NULL, '127.0.0.1', 0),
(9, 2, '·高二(上)数学获奖精品课件集9', 'test', '·高二(上)数学获奖精品课件集9', '2007-03-30 5:48:39', NULL, '127.0.0.1', 0),
(10, 2, '·高二(上)数学获奖精品课件集10', 'test', '·高二(上)数学获奖精品课件集10', '2007-03-30 5:53:23', NULL, '127.0.0.1', 0),
(11, 1, '·高二(上)数学获奖精品课件集11', 'test', '·高二(上)数学获奖精品课件集11', '2007-03-30 6:27:53', '2007-04-04 2:23:11', '127.0.0.1', 0),
(26, 11, '·高二(上)数学获奖精品课件集12', 'test', '·高二(上)数学获奖精品课件集12', '2007-03-30 8:24:01', '2007-03-30 8:40:19', '127.0.0.1', 1),
(23, 9, '·高二(上)数学获奖精品课件集13', 'admin', '·高二(上)数学获奖精品课件集13', '2007-03-30 7:34:40', NULL, '127.0.0.1', 0),
(27, 11, '·高二(上)数学获奖精品课件集14', 'test', '·高二(上)数学获奖精品课件集14', '2007-03-30 8:25:05', '2007-03-30 8:40:59', '127.0.0.1', 0),
(25, 10, '·高二(上)数学获奖精品课件集15', 'admin', '·高二(上)数学获奖精品课件集15', '2007-03-30 7:35:06', NULL, '127.0.0.1', 0),
(28, 12, '·高二(上)数学获奖精品课件集16', 'admin', '·高二(上)数学获奖精品课件集16', '2007-03-30 9:37:58', NULL, '127.0.0.1', 0),
(29, 11, '·高二(上)数学获奖精品课件集17', 'admin', '·高二(上)数学获奖精品课件集17', '2007-04-04 8:27:20', NULL, '127.0.0.1', 0),
(30, 11, '·高二(上)数学获奖精品课件集18', 'admin', '·高二(上)数学获奖精品课件集18', '2007-04-16 8:15:51', NULL, '127.0.0.1', 1),
(31, 12, '·高二(上)数学获奖精品课件集19', 'admin', '·高二(上)数学获奖精品课件集19', '2007-04-16 8:24:11', NULL, '127.0.0.1', 0),
(32, 19, '·高二(上)数学获奖精品课件集20', 'admin', '·高二(上)数学获奖精品课件集20', '2007-04-27 1:33:13', NULL, '127.0.0.1', 1),
(33, 1, '·高二(上)数学获奖精品课件集21', 'test', '·高二(上)数学获奖精品课件集21', '2007-04-27 1:34:30', NULL, '127.0.0.1', 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `sunshine`
-- 

CREATE TABLE `sunshine` (
  `id` int(11) NOT NULL auto_increment,
  `cat` tinyint(3) default '1',
  `title` varchar(150) NOT NULL,
  `author` varchar(50) default NULL,
  `ntime` varchar(20) NOT NULL,
  `hits` int(8) NOT NULL default '0',
  `content` mediumtext,
  `show` varchar(50) default NULL,
  `times` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=19 ;

-- 
-- 导出表中的数据 `sunshine`
-- 

INSERT INTO `sunshine` (`id`, `cat`, `title`, `author`, `ntime`, `hits`, `content`, `show`, `times`) VALUES 
(15, 1, '美国PEARSON出版社电子教材', '', '08/03/05', 0, '美国PEARSON出版社电子教材', '', 0),
(14, 1, '美国出版商McGraw-Hill课程', '', '08/03/05', 0, '美国出版商McGraw-Hill课程', '', 0),
(12, 1, '计算机课程资源库', '', '08/03/05', 0, '计算机课程资源库', '', 0),
(13, 1, '英语类课程资源库', '', '08/03/05', 1, '英语类课程资源库', '', 0),
(8, 1, '为什么人们不喜欢“13”？', '', '08/03/05', 0, '为什么人们不喜欢“13”？', '', 0),
(9, 1, '动物与数学', '', '08/03/05', 0, '动物与数学', '', 0),
(10, 1, '鸟蛋趣谈', '', '08/03/05', 0, '鸟蛋趣谈', '', 0),
(11, 1, '罗马数字', '', '08/03/05', 0, '罗马数字', '', 0),
(16, 1, '管理与市场课程资源展示', '', '08/03/05', 0, '管理与市场课程资源展示', '', 0),
(17, 1, '网络学院课程资源展示', '', '08/03/05', 2, '网络学院课程资源展示', '', 0),
(18, 1, '123456', '', '08/03/05', 0, '123456', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `tags`
-- 

CREATE TABLE `tags` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `tags`
-- 

INSERT INTO `tags` (`id`, `title`) VALUES 
(1, 'tags'),
(2, 'dgfdg'),
(3, 'test'),
(4, 'tttt');

-- --------------------------------------------------------

-- 
-- 表的结构 `topic`
-- 

CREATE TABLE `topic` (
  `id` int(11) NOT NULL auto_increment,
  `bid` tinyint(3) default '1',
  `title` varchar(150) NOT NULL,
  `username` varchar(15) default NULL,
  `content` mediumtext,
  `reviewcount` tinyint(3) default '0',
  `hits` int(11) default '0',
  `istop` tinyint(3) default '0',
  `iselite` tinyint(3) default '0',
  `addtime` varchar(50) default NULL,
  `edittime` varchar(50) default NULL,
  `reviewtime` varchar(50) default NULL,
  `revieuser` varchar(15) default NULL,
  `ip` varchar(20) default NULL,
  `islock` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=20 ;

-- 
-- 导出表中的数据 `topic`
-- 

INSERT INTO `topic` (`id`, `bid`, `title`, `username`, `content`, `reviewcount`, `hits`, `istop`, `iselite`, `addtime`, `edittime`, `reviewtime`, `revieuser`, `ip`, `islock`) VALUES 
(1, 1, '·高二(上)数学获奖精品课件集1', 'admin', '·高二(上)数学获奖精品课件集1', 2, 136, 1, 0, '2007-03-30 5:09:35', NULL, '2007-04-27 1:34:30', 'test', '127.0.0.1', 0),
(2, 1, '·高二(上)数学获奖精品课件集2', 'admin', '·高二(上)数学获奖精品课件集2', 9, 250, 0, 0, '2007-03-30 5:09:44', NULL, '2007-03-30 5:53:23', 'test', '127.0.0.1', 0),
(10, 2, '·高二(上)数学获奖精品课件集3', 'admin', '·高二(上)数学获奖精品课件集3', 1, 127, 0, 0, '2007-03-30 7:34:50', NULL, '2007-03-30 7:35:06', 'admin', '127.0.0.1', 0),
(4, 0, '·高二(上)数学获奖精品课件集3', 'test', '·高二(上)数学获奖精品课件集3', 0, 38, 0, 0, '2007-03-30 7:16:25', NULL, '2007-03-30 7:16:25', 'test', '127.0.0.1', 0),
(9, 2, '·高二(上)数学获奖精品课件集4', 'admin', '·高二(上)数学获奖精品课件集4', 2, 109, 0, 0, '2007-03-30 7:34:19', NULL, '2007-03-30 7:34:40', 'admin', '127.0.0.1', 0),
(11, 1, '·高二(上)数学获奖精品课件集5', 'test', '·高二(上)数学获奖精品课件集5', 4, 157, 1, 1, '2007-03-30 8:23:54', '2007-03-30 8:34:37', '2007-04-16 8:15:51', 'admin', '127.0.0.1', 0),
(12, 2, '·高二(上)数学获奖精品课件集6', 'admin', '·高二(上)数学获奖精品课件集6', 2, 7, 0, 0, '2007-03-30 9:37:48', NULL, '2007-04-16 8:24:11', 'admin', '127.0.0.1', 0),
(14, 2, '·高二(上)数学获奖精品课件集7', 'admin', '·高二(上)数学获奖精品课件集7', 0, 0, 0, 0, '2007-04-16 8:32:56', NULL, '2007-04-16 8:32:56', 'admin', '127.0.0.1', 0),
(15, 1, '·高二(上)数学获奖精品课件集9', 'admin', '·高二(上)数学获奖精品课件集9', 0, 0, 0, 0, '2007-04-16 8:33:19', NULL, '2007-04-16 8:33:19', 'admin', '127.0.0.1', 1),
(16, 2, '·高二(上)数学获奖精品课件集10', 'admin', '·高二(上)数学获奖精品课件集10', 0, 3, 0, 0, '2007-04-16 8:36:15', NULL, '2007-04-16 8:36:15', 'admin', '127.0.0.1', 0),
(17, 2, '·高二(上)数学获奖精品课件集11', 'admin', '·高二(上)数学获奖精品课件集11', 0, 1, 0, 0, '2007-04-16 8:37:42', NULL, '2007-04-16 8:37:42', 'admin', '127.0.0.1', 0),
(18, 1, '·高二(上)数学获奖精品课件集12', 'admin', '·高二(上)数学获奖精品课件集12', 0, 9, 0, 0, '2007-04-16 8:39:02', NULL, '2007-04-16 8:39:02', 'admin', '127.0.0.1', 1),
(19, 2, '高二(上)数学获奖精品课件集13', 'admin', '高二(上)数学获奖精品课件集13', 1, 17, 0, 1, '2007-04-16 8:39:13', NULL, '2007-04-27 1:33:13', 'admin', '127.0.0.1', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `updaoshi`
-- 

CREATE TABLE `updaoshi` (
  `id` int(11) NOT NULL auto_increment,
  `truename` varchar(50) default NULL,
  `birth` varchar(20) default NULL,
  `yuanxi` varchar(50) default NULL,
  `zhuanye` varchar(50) default NULL,
  `xueli` tinyint(3) default '1',
  `daima` varchar(50) default NULL,
  `xuehao` varchar(50) default NULL,
  `tel` varchar(20) default NULL,
  `email` varchar(30) default NULL,
  `yiyuan` varchar(200) default NULL,
  `userid` mediumtext,
  `photo` varchar(255) default NULL,
  `jianli` varchar(255) default NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `updaoshi`
-- 

INSERT INTO `updaoshi` (`id`, `truename`, `birth`, `yuanxi`, `zhuanye`, `xueli`, `daima`, `xuehao`, `tel`, `email`, `yiyuan`, `userid`, `photo`, `jianli`, `pass`) VALUES 
(1, 'dfgfdgd', 'dfgdfg', 'dgdf', 'dfgfd', 1, 'fgdfg', 'dfgfd', 'gdfg', 'admin@admin.com', 'dfgfdg', '1|7|9|10|11', '', '', '20070426060759292'),
(2, 'sdf', 'sdf', 'sfsd', 'fsd', 1, 'sfdsd', 'sdfsd', 'fsdf', 'admin@admin.com', 'sfsdfsd', '1|12', '', '', '20070426072727279'),
(3, 'dfgd', 'dgdf', 'dfg', 'dfgfd', 1, 'dfg', 'dfg', 'dfg', 'admin@admin.com', 'dfgfdg', '1|12', '', '', '20070426075513613'),
(4, '真实姓名', '1900年01月01', '院系', '专业', 2, '班级代码', '学号', '联系电话', 'admin@admin.com', '申请意愿', 'alanliu,test', '', '', '20070514034336819'),
(5, 'dfgdfg', '1900年01月01日', 'dfgfdg', 'dfgdfg', 1, 'dfgdfgdf', 'dgfd', 'dfgf', 'admin@admin.com', 'dfgdfgfd', 'alanliu,test', './upfiles/20070517014201402.jpg', './upfiles/20070517014156224.doc', '20070517013452119'),
(6, '测试姓名', '1900年01月01日', '院系', '专业', 1, '班级代码', '学号', '021-12345678', 'admin@admin.com', '申请意愿申请意愿<br />\r\n申请意愿申请意愿<br />\r\n申请意愿', 'test,admin', './upfiles/20070528015756124.jpg', './upfiles/20070528015802567.doc', '20070528015814485');

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(12) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `question` varchar(255) default NULL,
  `answer` varchar(255) default NULL,
  `truename` varchar(10) default NULL,
  `birth` varchar(20) default NULL,
  `photo` varchar(255) default NULL,
  `com` varchar(50) default NULL,
  `postion` varchar(20) default NULL,
  `intro` varchar(200) default NULL,
  `address` varchar(100) default NULL,
  `zip` varchar(10) default NULL,
  `tel` varchar(20) default NULL,
  `tax` varchar(20) default NULL,
  `mobile` varchar(12) default NULL,
  `email` varchar(30) default NULL,
  `experience` varchar(500) default NULL,
  `job` varchar(500) default NULL,
  `hoby` varchar(100) default NULL,
  `expect` varchar(100) default NULL,
  `hope` varchar(100) default NULL,
  `jianli` varchar(300) default NULL,
  `super` tinyint(3) default '1',
  `isteach` tinyint(3) default '0',
  `islock` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=28 ;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` (`id`, `username`, `userpass`, `question`, `answer`, `truename`, `birth`, `photo`, `com`, `postion`, `intro`, `address`, `zip`, `tel`, `tax`, `mobile`, `email`, `experience`, `job`, `hoby`, `expect`, `hope`, `jianli`, `super`, `isteach`, `islock`) VALUES 
(24, 'qqqwww', '64be4374fed9e072a40744e5e9498098', 'qqqwww', 'qqqwww', '小小明明', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(25, 'rrr123', '65a647d1851fd3e3fb3a0b10e16cd7cd', 'rrr123', 'rrr123', '大明大明', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(26, 'ttt123', '559dd40df7d342a84c2c133829ceab26', 'ttt123', 'ttt123', '磊小', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1),
(27, 'qqq123', '931bd0e1cc9baae10e9ff6ca7002e834', 'qqq123', 'qqq123', '不不不不', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(7, 'alanliu', '21232f297a57a5a743894a0e4a801fc3', '666666', '000000', 'alanliu', '1900/1/1', '20070323101313779.jpg', 'company', 'position', 'intro', 'address', '123456', '021-12547851', '021-12547851', '123456789', 'admin@admin.com', 'experience', 'job', 'hoby', 'expect', 'hope', '20070323165659332.doc', 1, 1, 0),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', '111111', '111111111', '小明', '1900?ê01??', '20070323165616994.gif', '?ù??????', '?°??', '?????ò?é', '???í????', '', '021-12345678', '021-12345678', '15945678755', 'admin@admin.com', '?????¨?ó?§?à?????????ú', '?????÷???¤×÷???ú', '???????¤°???', '?????ó?????á???¨?é??????', '?????????ó?????á?á????????', '20070323165659332.doc', 3, 1, 0),
(10, 'sdfsdf', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0),
(11, 'sdfsdfds', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'sdfsdfds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0),
(12, 'sdfdgfdg', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'sdfdgfdg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0),
(13, 'dgdfgdfh', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'dgdfgdfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0),
(14, '45dgdfgfd', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '45dgdfgfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0),
(15, 'dfdhfghgf4', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'dfdhfghgf4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(16, 'haha', 'e10adc3949ba59abbe56e057f20f883e', '656565654', '21654656', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1),
(17, 'dfgdfg', 'e10adc3949ba59abbe56e057f20f883e', '56465465', '124156465', '真实姓名', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1),
(18, 's123456', 'e13f3643cc57e9c43577229842080912', 's123456', 's123456', '小小明', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(19, 'c123456', 'ad07fb25aa2d3a9f96ee12f25e0be902', 'c123456', 'c123456', '小小', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(20, 'd123456', 'adf00707a1c0154a9ad8edb57c8646f4', 'd123456', 'd123456', '小小', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1),
(21, 'e123456', 'a115a58e6c40da1887f9c5072ba14a37', 'e123456', 'e123456', '小小', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(22, 'ss123456', 'baf0f0afd319bf489c5fe7d5a44b7a52', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(23, 'ww123456', 'b52c0992c2d18eddbad0c05bac922cee', 'ww123456', 'ww123456', '小是', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0);

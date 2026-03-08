-- character_table.sql
-- phpMyAdmin 또는 MySQL CLI에서 실행

CREATE TABLE IF NOT EXISTS `character` (
    `id`          INT AUTO_INCREMENT PRIMARY KEY,
    `type`        VARCHAR(20)  NOT NULL,
    `name`        VARCHAR(100) NOT NULL,
    `gender`      VARCHAR(10)  NOT NULL,
    `color`       VARCHAR(20)  NOT NULL,
    `description` TEXT,
    `likes`       VARCHAR(200),
    `image`       VARCHAR(100) DEFAULT 'nopic.png',
    `status`      TINYINT      DEFAULT 1  -- 1: 공개, 0: 비공개
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 기존 data.js 데이터 초기 삽입
INSERT INTO `character` (type, name, gender, color, description, likes, image) VALUES
('Grass',     'Haruna Susuki (鈴木 陽菜)',    'female', 'green',  '풀의 능력자. 엘리트 교육을 받았으나 타인의 시선을 과하게 의식해, 능력을 제대로 발휘하지 못한다는 약점이 있다.', 'Taichi Iwakura', 'nopic.png'),
('Fire',      'Hanabi Homura (炎 花火)',       'female', 'red',    '불의 능력자. 열정적이고 불같은 성격으로 인해, 리오 이외에는 친구가 없었고, 그랬기에 다른 사람이 자신을 챙겨 주었으면 하는 바람이 있어 리오와 같이 프로그램에 참가한다.', 'Hagane Kaneko', 'nopic.png'),
('Water',     'Rio Shimizu (清水 莉央)',       'female', 'blue',   '물의 능력자. 능력이 상대적으로 떨어진다는 이유만으로 집 안에서 "감정 쓰레기통"으로 살았다. 소꿉친구인 하나비와 같이 프로그램에 참가해, 자유분방하게 사는 라이덴을 보고 호감을 느낀다.', 'Raiden Ogura', 'nopic.png'),
('Lightning', 'Raiden Ogura (小倉 雷電)',      'male',   'yellow', '전기의 능력자. 자유분방한 성격으로, 강한 능력을 지니고 있으나, 이를 인정받고 싶은 욕망이 너무 커, 타인의 시선을 신경 쓰지 않고 자신이 하고 싶은 대로 행동한다. 그로 인해 주변과 갈등이 많았다.', 'Rio Shimizu', 'nopic.png'),
('Psychic',   'Akari Kurosaki (黒崎 明里)',    'female', 'purple', '빛의 능력자. 남들을 편견 없이 바라본다는 평가를 받지만, 이는 타인의 마음을 읽을 수 있는 또 다른 능력 덕분이다. 타케루에 관련된 사건으로 인해 그의 존재를 알게 되었고, 자신을 좋아하는 그에게 흥미를 가지고 있다.', 'Takeru Yamato', 'nopic.png'),
('Earth',     'Taichi Iwakura (岩倉 大地)',    'male',   'orange', '땅의 능력자. 뼈대 있는 가문을 잇기 위해 무엇이든 해야 한다고 들었기 때문에, 자신이 좋아하는 하루나에게 관심을 보이는 것조차도 부담스러워한다.', 'Haruna Susuki', 'nopic.png'),
('Dark',      'Takeru Yamato (大和 武)',       'male',   'teal',   '어둠의 능력자. 생계형 범죄를 저질렀던 타케루의 부친은, 아들의 이름이 나라의 영웅이었던 탓에, 더 무거운 형을 선고받는다. 범죄자의 아들이란 낙인 속에 자라, 자신을 편견 없이 바라보는 아카리에게 호감이 있다.', 'Akari Kurosaki', 'nopic.png'),
('Metal',     'Hagane Kaneko (金子 鋼)',       'male',   'gray',   '강철의 능력자. 용모와 이름이 상대적으로 여성스러운 탓에 주변에서 자주 오해받기에, 이에 대한 컴플렉스로 절대적인 힘을 동경한다. 이에 붙은 별명은 "철혈"이다.', 'Hanabi Homura', 'nopic.png'),
('Dragon',    'Ryunosuke Onizuka (鬼塚 竜之介)', 'male', 'olive',  '용의 능력자. 대부분의 용족은 다른 일족의 배신으로 목숨을 잃었다. "용족 살해 사건"의 진실을 알리기 위해 참가했지만, 일족의 원수인 바람 일족의 대표가 준코라는 사실에 프로그램의 주최 의도를 의심하게 된다.', 'Junko Hoshizora', 'nopic.png'),
('Wind',      'Junko Hoshizora (星空 純子)',   'female', 'aqua',   '바람의 능력자. 뛰어난 능력과 수려한 외모로 인해 많은 사람들의 관심을 받지만, 진정한 친구가 없다는 사실에 외로움을 느낀다. 일족에 의해 기억이 왜곡된 채 "소라"라는 이름으로 대회에 참가 중이다.', 'Ryunosuke Onizuka (현재는 기억 왜곡의 여파로 적으로 인식 중)', 'nopic.png');

<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Question;
use Illuminate\Database\Seeder;

class LearningContentSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            [
                'title' => 'Tabel Hiragana lengkap',
                'category' => 'Hiragana',
                'content_format' => 'kana_chart',
                'content' => <<<'CHART'
Huruf dasar (gojūon)
Baris|a|i|u|e|o
Vokal|あ a|い i|う u|え e|お o
K|か ka|き ki|く ku|け ke|こ ko
S|さ sa|し shi|す su|せ se|そ so
T|た ta|ち chi|つ tsu|て te|と to
N|な na|に ni|ぬ nu|ね ne|の no
H|は ha|ひ hi|ふ fu|へ he|ほ ho
M|ま ma|み mi|む mu|め me|も mo
Y|や ya|—|ゆ yu|—|よ yo
R|ら ra|り ri|る ru|れ re|ろ ro
W|わ wa|—|—|—|を o (partikel: wo)
N|ん n|—|—|—|—

Dakuten dan handakuten
Baris|a|i|u|e|o
G|が ga|ぎ gi|ぐ gu|げ ge|ご go
Z|ざ za|じ ji|ず zu|ぜ ze|ぞ zo
D|だ da|ぢ ji*|づ zu*|で de|ど do
B|ば ba|び bi|ぶ bu|べ be|ぼ bo
P|ぱ pa|ぴ pi|ぷ pu|ぺ pe|ぽ po

Bunyi gabungan (yōon)
Baris|ya|yu|yo
K|きゃ kya|きゅ kyu|きょ kyo
Sh|しゃ sha|しゅ shu|しょ sho
Ch|ちゃ cha|ちゅ chu|ちょ cho
N|にゃ nya|にゅ nyu|にょ nyo
H|ひゃ hya|ひゅ hyu|ひょ hyo
M|みゃ mya|みゅ myu|みょ myo
R|りゃ rya|りゅ ryu|りょ ryo
G|ぎゃ gya|ぎゅ gyu|ぎょ gyo
J|じゃ ja|じゅ ju|じょ jo
B|びゃ bya|びゅ byu|びょ byo
P|ぴゃ pya|ぴゅ pyu|ぴょ pyo
* ぢ dan づ terutama muncul pada kata tertentu; dalam banyak kata modern, じ dan ず lebih umum.
CHART
            ],
            [
                'title' => 'Tabel Katakana lengkap',
                'category' => 'Katakana',
                'content_format' => 'kana_chart',
                'content' => <<<'CHART'
Huruf dasar (gojūon)
Baris|a|i|u|e|o
Vokal|ア a|イ i|ウ u|エ e|オ o
K|カ ka|キ ki|ク ku|ケ ke|コ ko
S|サ sa|シ shi|ス su|セ se|ソ so
T|タ ta|チ chi|ツ tsu|テ te|ト to
N|ナ na|ニ ni|ヌ nu|ネ ne|ノ no
H|ハ ha|ヒ hi|フ fu|ヘ he|ホ ho
M|マ ma|ミ mi|ム mu|メ me|モ mo
Y|ヤ ya|—|ユ yu|—|ヨ yo
R|ラ ra|リ ri|ル ru|レ re|ロ ro
W|ワ wa|—|—|—|ヲ o (partikel: wo)
N|ン n|—|—|—|—

Dakuten dan handakuten
Baris|a|i|u|e|o
G|ガ ga|ギ gi|グ gu|ゲ ge|ゴ go
Z|ザ za|ジ ji|ズ zu|ゼ ze|ゾ zo
D|ダ da|ヂ ji*|ヅ zu*|デ de|ド do
B|バ ba|ビ bi|ブ bu|ベ be|ボ bo
P|パ pa|ピ pi|プ pu|ペ pe|ポ po

Bunyi gabungan (yōon)
Baris|ya|yu|yo
K|キャ kya|キュ kyu|キョ kyo
Sh|シャ sha|シュ shu|ショ sho
Ch|チャ cha|チュ chu|チョ cho
N|ニャ nya|ニュ nyu|ニョ nyo
H|ヒャ hya|ヒュ hyu|ヒョ hyo
M|ミャ mya|ミュ myu|ミョ myo
R|リャ rya|リュ ryu|リョ ryo
G|ギャ gya|ギュ gyu|ギョ gyo
J|ジャ ja|ジュ ju|ジョ jo
B|ビャ bya|ビュ byu|ビョ byo
P|ピャ pya|ピュ pyu|ピョ pyo
* ヂ dan ヅ terutama muncul pada kata tertentu; dalam banyak kata modern, ジ dan ズ lebih umum.

Bunyi tambahan untuk kata serapan
Contoh|Bacaan
ファ|fa
フィ|fi
フェ|fe
フォ|fo
ティ|ti
ディ|di
ウィ|wi
ウェ|we
ウォ|wo
ヴァ|va
ヴ|vu
CHART
            ],
            [
                'title' => 'Lima vokal Hiragana',
                'category' => 'Hiragana',
                'content' => "あ dibaca a\nい dibaca i\nう dibaca u\nえ dibaca e\nお dibaca o\n\nLatih pengucapan setiap huruf dengan suara jelas.",
            ],
            [
                'title' => 'Salam dasar bahasa Jepang',
                'category' => 'Kosakata',
                'content' => "こんにちは (konnichiwa) berarti halo atau selamat siang.\nありがとう (arigatou) berarti terima kasih.\nすみません (sumimasen) berarti permisi atau maaf.",
            ],
            [
                'title' => 'Hiragana: baris ka, sa, ta, dan na',
                'category' => 'Hiragana',
                'content' => "Baca setiap huruf dan pasangkan dengan bunyinya:\n\nか (ka), き (ki), く (ku), け (ke), こ (ko)\nさ (sa), し (shi), す (su), せ (se), そ (so)\nた (ta), ち (chi), つ (tsu), て (te), と (to)\nな (na), に (ni), ぬ (nu), ね (ne), の (no)\n\nPerhatikan bahwa し dibaca shi, ち dibaca chi, dan つ dibaca tsu. Coba tulis tiap baris beberapa kali sambil mengucapkan bunyinya.",
            ],
            [
                'title' => 'Hiragana: dakuten dan handakuten',
                'category' => 'Hiragana',
                'content' => "Tanda dakuten (゛) mengubah bunyi beberapa huruf:\n\nか行 menjadi が行: が ga, ぎ gi, ぐ gu, げ ge, ご go\nさ行 menjadi ざ行: ざ za, じ ji, ず zu, ぜ ze, ぞ zo\nた行 menjadi だ行: だ da, ぢ ji, づ zu, で de, ど do\nは行 menjadi ば行: ば ba, び bi, ぶ bu, べ be, ぼ bo\n\nHandakuten (゜) mengubah は行 menjadi ぱ行: ぱ pa, ぴ pi, ぷ pu, ぺ pe, ぽ po.\n\nContoh: か (ka) menjadi が (ga), sedangkan は (ha) menjadi ぱ (pa) dengan handakuten.",
            ],
            [
                'title' => 'Hiragana: bunyi gabungan dan konsonan rangkap',
                'category' => 'Hiragana',
                'content' => "Bunyi gabungan dibuat dari huruf berakhiran i dan ゃ, ゅ, atau ょ berukuran kecil:\n\nきゃ kya, きゅ kyu, きょ kyo\nしゃ sha, しゅ shu, しょ sho\nちゃ cha, ちゅ chu, ちょ cho\n\nHuruf っ kecil memberi jeda singkat dan menggandakan konsonan berikutnya. Contoh: きって dibaca kitte (perangko), dan がっこう dibaca gakkou (sekolah).\n\nLatih membaca kata secara utuh, bukan hanya huruf per huruf.",
            ],
            [
                'title' => 'Katakana: bentuk dasar dan huruf yang mirip',
                'category' => 'Katakana',
                'content' => "Katakana banyak dipakai untuk kata serapan dan nama asing. Pelajari bunyi berikut:\n\nア a, イ i, ウ u, エ e, オ o\nカ ka, キ ki, ク ku, ケ ke, コ ko\nサ sa, シ shi, ス su, セ se, ソ so\nタ ta, チ chi, ツ tsu, テ te, ト to\n\nJangan tertukar シ (shi) dengan ツ (tsu), serta ソ (so) dengan ン (n). Amati arah dan kemiringan garis ketika menulis.",
            ],
            [
                'title' => 'Katakana: dakuten dan bunyi gabungan',
                'category' => 'Katakana',
                'content' => "Seperti Hiragana, dakuten (゛) mengubah bunyi Katakana:\n\nカ (ka) menjadi ガ (ga)\nハ (ha) menjadi バ (ba)\nハ (ha) dengan handakuten menjadi パ (pa)\n\nBunyi gabungan memakai ャ, ュ, ョ kecil. Contoh: キャ (kya), シュ (shu), チョ (cho).\n\nBunyi asing kadang ditulis dengan kombinasi khusus, misalnya ティ (ti) pada kata パーティー (pesta).",
            ],
            [
                'title' => 'Katakana: kata serapan sehari-hari',
                'category' => 'Katakana',
                'content' => "Banyak kata serapan bahasa Jepang ditulis dengan Katakana:\n\nコーヒー (koohii) = kopi\nテレビ (terebi) = televisi\nパン (pan) = roti\nホテル (hoteru) = hotel\nバス (basu) = bus\nタクシー (takushii) = taksi\nコンピューター (konpyuutaa) = komputer\n\nGaris panjang ー menandakan vokal sebelumnya dipanjangkan. Contoh: コーヒー dibaca koo-hii.",
            ],
            [
                'title' => 'Kosakata: salam dan ungkapan sopan',
                'category' => 'Kosakata',
                'content' => "Ungkapan dasar untuk menyapa dan berbicara sopan:\n\nおはようございます (ohayou gozaimasu) = selamat pagi\nこんにちは (konnichiwa) = halo/selamat siang\nこんばんは (konbanwa) = selamat malam\nありがとう (arigatou) = terima kasih\nすみません (sumimasen) = permisi/maaf\nはい (hai) = ya\nいいえ (iie) = tidak\n\nGunakan ありがとうございます (arigatou gozaimasu) untuk mengucapkan terima kasih dengan lebih sopan.",
            ],
            [
                'title' => 'Kosakata: orang, tempat, dan benda',
                'category' => 'Kosakata',
                'content' => "Kosakata dasar yang sering ditemui:\n\nわたし (watashi) = saya\nせんせい (sensei) = guru\nともだち (tomodachi) = teman\nがっこう (gakkou) = sekolah\nねこ (neko) = kucing\nいぬ (inu) = anjing\nみず (mizu) = air\n\nContoh kalimat: わたしは がくせいです (Watashi wa gakusei desu) berarti “Saya adalah siswa.”",
            ],
            [
                'title' => 'Kosakata: kegiatan dan angka dasar',
                'category' => 'Kosakata',
                'content' => "Kata kerja sopan bentuk -ます:\n\nたべます (tabemasu) = makan\nのみます (nomimasu) = minum\n\nAngka dasar:\n\nいち (ichi) = satu\nに (ni) = dua\nさん (san) = tiga\nよん (yon) = empat\nご (go) = lima\n\nいくら (ikura) berarti “berapa harganya?”. Contoh: これは いくらですか (Kore wa ikura desu ka) = “Berapa harga ini?”",
            ],
            [
                'title' => 'Kanji dasar dan level JLPT',
                'category' => 'Kanji',
                'content' => "Kanji adalah karakter yang membawa makna. Satu karakter dapat memiliki beberapa cara baca: onyomi (bacaan asal Tiongkok) dan kunyomi (bacaan asli Jepang).\n\nKanji pemula:\n\n日 — kunyomi: ひ (hi), onyomi: ニチ (nichi) — matahari/hari. Contoh: 日本 (にほん, Nihon) = Jepang.\n月 — kunyomi: つき (tsuki), onyomi: ゲツ (getsu) — bulan. Contoh: 月曜日 (げつようび, getsuyoubi) = Senin.\n山 — kunyomi: やま (yama), onyomi: サン (san) — gunung. Contoh: 富士山 (ふじさん, Fujisan) = Gunung Fuji.\n川 — kunyomi: かわ (kawa), onyomi: セン (sen) — sungai.\n人 — kunyomi: ひと (hito), onyomi: ジン (jin) — orang. Contoh: 日本人 (にほんじん, nihonjin) = orang Jepang.\n水 — kunyomi: みず (mizu), onyomi: スイ (sui) — air.\n火 — kunyomi: ひ (hi), onyomi: カ (ka) — api.\n木 — kunyomi: き (ki), onyomi: モク (moku) — pohon/kayu.\n\nUrutan goresan membantu tulisan tetap rapi: tulis dari atas ke bawah dan dari kiri ke kanan; perhatikan bentuk tiap karakter dan ikuti diagram urutan goresan pada kamus tepercaya. Contoh kalimat: 山に行きます (やまにいきます, yama ni ikimasu) = Saya pergi ke gunung.\n\nPeta belajar JLPT: N5–N4 untuk dasar, N3 tingkat menengah, dan N2–N1 untuk bacaan serta kosakata tingkat lanjut. Pelajari radikal dan contoh kata; jangan menghafal satu bacaan tanpa konteks.",
            ],
            [
                'title' => 'Grammar dasar: partikel dan pola kalimat',
                'category' => 'Grammar',
                'content' => "Pola dasar bahasa Jepang: topik + keterangan + predikat. Predikat umumnya berada di akhir kalimat.\n\nPola: [topik] は [keterangan] です。\nわたしは がくせいです (Watashi wa gakusei desu) = Saya seorang siswa.\n\nPartikel dasar:\nは (wa) menandai topik: わたしは ... = tentang saya ...\nが (ga) menandai subjek atau informasi baru: ねこがいます = ada kucing.\nを (o) menandai objek: みずをのみます = minum air.\nに (ni) menandai tujuan/waktu: がっこうにいきます = pergi ke sekolah.\nで (de) menandai tempat kegiatan: がっこうでべんきょうします = belajar di sekolah.\nの (no) menyatakan kepunyaan: わたしのほん = buku saya.\nも (mo) berarti juga: わたしもがくせいです = saya juga siswa.\n\nKata kerja sopan: たべます (makan) → たべません (tidak makan) → たべました (sudah makan) → たべませんでした (tidak makan pada waktu lampau).\nKata sifat: おいしいです (enak) → おいしくないです (tidak enak) → おいしかったです (dulu enak). Kata sifat な memakai じゃありません untuk bentuk negatif: しずかです → しずかじゃありません.\n\nPercakapan:\nA: これは なんですか (Kore wa nan desu ka?) = Ini apa?\nB: ほんです (Hon desu.) = Buku.\n\nCoba lengkapi: わたし___パン___たべます (Saya makan roti). Jawaban: は, を. Baca contoh Jepang dengan tombol audio di materi.",
            ],
            [
                'title' => 'Kosakata tematik sehari-hari',
                'category' => 'Kosakata',
                'content' => "Salam dan perkenalan\nはじめまして (hajimemashite) = salam kenal\nわたし (watashi) = saya\n\nAngka dan waktu\nいち (ichi) = satu\nさんじ (sanji) = pukul tiga\nきょう (kyou) = hari ini\n\nKeluarga\nおかあさん (okaasan) = ibu\nおとうさん (otousan) = ayah\n\nSekolah\n学校 / がっこう (gakkou) = sekolah\n先生 / せんせい (sensei) = guru\n\nMakanan dan minuman\nごはん (gohan) = nasi/makanan\n水 / みず (mizu) = air\n\nHewan\n猫 / ねこ (neko) = kucing\n犬 / いぬ (inu) = anjing\n\nAktivitas sehari-hari\n食べます / たべます (tabemasu) = makan\n飲みます / のみます (nomimasu) = minum\n\nTempat dan transportasi\n駅 / えき (eki) = stasiun\n電車 / でんしゃ (densha) = kereta\n\n                Pilih ikon suara di samping tulisan Jepang untuk berlatih pelafalan.",
                'content' => "Salam dan perkenalan\nはじめまして (hajimemashite) = salam kenal\nわたし (watashi) = saya\n\nAngka dan waktu\nいち (ichi) = satu\nさんじ (sanji) = pukul tiga\nきょう (kyou) = hari ini\n\nKeluarga\nおかあさん (okaasan) = ibu\nおとうさん (otousan) = ayah\n\nSekolah\n学校 / がっこう (gakkou) = sekolah\n先生 / せんせい (sensei) = guru\n\nMakanan dan minuman\nごはん (gohan) = nasi/makanan\n水 / みず (mizu) = air\n\nHewan\n猫 / ねこ (neko) = kucing\n犬 / いぬ (inu) = anjing\n\nAktivitas sehari-hari\n食べます / たべます (tabemasu) = makan\n飲みます / のみます (nomimasu) = minum\n\nTempat dan transportasi\n駅 / えき (eki) = stasiun\n電車 / でんしゃ (densha) = kereta\n\nPilih ikon suara di samping tulisan Jepang untuk berlatih pelafalan.",
            ],
            [
                'title' => 'Kosakata: perkenalan dan ungkapan sehari-hari',
                                'category' => 'Kosakata',
                                'content' => "Salam saat pertama bertemu:\nはじめまして (hajimemashite) = salam kenal\nわたしはアンです (watashi wa An desu) = saya An\nインドネシアからきました (Indoneshia kara kimashita) = saya datang dari Indonesia\nよろしくおねがいします (yoroshiku onegaishimasu) = senang berkenalan / mohon bantuannya\n\nUngkapan penting:\nおはようございます (ohayou gozaimasu) = selamat pagi\nこんにちは (konnichiwa) = halo / selamat siang\nこんばんは (konbanwa) = selamat malam\nありがとうございます (arigatou gozaimasu) = terima kasih (sopan)\nすみません (sumimasen) = permisi / maaf\nおねがいします (onegaishimasu) = tolong / mohon\n\nPola perkenalan: はじめまして。わたしは [nama] です。インドネシアからきました。よろしくおねがいします。\nLatihan: ganti [nama] dengan namamu sendiri dan dengarkan setiap kalimat dengan tombol audio.",
                            ],
                            [
                                'title' => 'Kosakata: angka, tanggal, dan waktu',
                                'category' => 'Kosakata',
                                'content' => "Angka 1–10:\n一 / いち (ichi) = satu\n二 / に (ni) = dua\n三 / さん (san) = tiga\n四 / よん (yon) = empat\n五 / ご (go) = lima\n六 / ろく (roku) = enam\n七 / なな (nana) = tujuh\n八 / はち (hachi) = delapan\n九 / きゅう (kyuu) = sembilan\n十 / じゅう (juu) = sepuluh\n\nWaktu dan hari:\n今日 / きょう (kyou) = hari ini\n明日 / あした (ashita) = besok\n昨日 / きのう (kinou) = kemarin\n朝 / あさ (asa) = pagi\n昼 / ひる (hiru) = siang\n夜 / よる (yoru) = malam\n月曜日 / げつようび (getsuyoubi) = Senin\n日曜日 / にちようび (nichiyoubi) = Minggu\n\nPola jam: [angka] 時 (ji). Contoh: 三時 (さんじ, sanji) = pukul tiga. Tanyakan waktu dengan いま なんじですか (ima nanji desu ka) = sekarang pukul berapa?",
                            ],
                            [
                                'title' => 'Kosakata: anggota keluarga',
                                'category' => 'Kosakata',
                                'content' => "Keluarga sendiri (bentuk umum):\n家族 / かぞく (kazoku) = keluarga\n父 / ちち (chichi) = ayah saya\n母 / はは (haha) = ibu saya\n兄 / あに (ani) = kakak laki-laki saya\n姉 / あね (ane) = kakak perempuan saya\n弟 / おとうと (otouto) = adik laki-laki saya\n妹 / いもうと (imouto) = adik perempuan saya\n\nSaat berbicara sopan tentang keluarga orang lain:\nお父さん / おとうさん (otousan) = ayah\nお母さん / おかあさん (okaasan) = ibu\nお兄さん / おにいさん (oniisan) = kakak laki-laki\nお姉さん / おねえさん (oneesan) = kakak perempuan\n\nContoh: わたしの家族は四人です (watashi no kazoku wa yonin desu) = keluarga saya terdiri dari empat orang. Perhatikan bahwa sebutan untuk keluarga sendiri dan keluarga lawan bicara berbeda tingkat kesopanannya.",
                            ],
                            [
                                'title' => 'Kosakata: sekolah dan kegiatan belajar',
                                'category' => 'Kosakata',
                                'content' => "学校 / がっこう (gakkou) = sekolah\n教室 / きょうしつ (kyoushitsu) = ruang kelas\n先生 / せんせい (sensei) = guru\n学生 / がくせい (gakusei) = siswa / mahasiswa\n友達 / ともだち (tomodachi) = teman\n本 / ほん (hon) = buku\n辞書 / じしょ (jisho) = kamus\n日本語 / にほんご (nihongo) = bahasa Jepang\n勉強 / べんきょう (benkyou) = belajar\n宿題 / しゅくだい (shukudai) = pekerjaan rumah\n\nContoh: としょかんで日本語を勉強します (toshokan de nihongo o benkyou shimasu) = saya belajar bahasa Jepang di perpustakaan. Tekan ikon suara untuk mendengarkan kosakata Kanji dan Hiragana.",
                            ],
                            [
                                'title' => 'Kosakata: makanan dan minuman',
                                'category' => 'Kosakata',
                                'content' => "ご飯 / ごはん (gohan) = nasi / makanan\n水 / みず (mizu) = air\nお茶 / おちゃ (ocha) = teh\n牛乳 / ぎゅうにゅう (gyuunyuu) = susu\n魚 / さかな (sakana) = ikan\n肉 / にく (niku) = daging\n野菜 / やさい (yasai) = sayuran\n卵 / たまご (tamago) = telur\nりんご (ringo) = apel\n寿司 / すし (sushi) = sushi\n\nKata kerja: 食べます / たべます (tabemasu) = makan; 飲みます / のみます (nomimasu) = minum.\nContoh: りんごを食べます (ringo o tabemasu) = makan apel. Di restoran, お水をください (omizu o kudasai) berarti “air putih, tolong”.",
                            ],
                            [
                                'title' => 'Kosakata: hewan',
                                'category' => 'Kosakata',
                                'content' => "猫 / ねこ (neko) = kucing\n犬 / いぬ (inu) = anjing\n鳥 / とり (tori) = burung\n魚 / さかな (sakana) = ikan\n馬 / うま (uma) = kuda\n牛 / うし (ushi) = sapi\n豚 / ぶた (buta) = babi\n兎 / うさぎ (usagi) = kelinci\n象 / ぞう (zou) = gajah\n動物 / どうぶつ (doubutsu) = hewan\n\nPola sederhana: [hewan] が好きです ([hewan] ga suki desu) = suka [hewan]. Contoh: ねこが好きです (neko ga suki desu) = saya suka kucing. Kanji hewan tertentu memiliki bacaan khusus; pelajari bersama contoh katanya.",
                            ],
                            [
                                'title' => 'Kosakata: aktivitas sehari-hari',
                                'category' => 'Kosakata',
                                'content' => "起きます / おきます (okimasu) = bangun\n寝ます / ねます (nemasu) = tidur\n行きます / いきます (ikimasu) = pergi\n帰ります / かえります (kaerimasu) = pulang\n食べます / たべます (tabemasu) = makan\n飲みます / のみます (nomimasu) = minum\n読みます / よみます (yomimasu) = membaca\n書きます / かきます (kakimasu) = menulis\n聞きます / ききます (kikimasu) = mendengarkan / bertanya\n勉強します / べんきょうします (benkyou shimasu) = belajar\n\nContoh rutinitas: あさ六時におきます (asa rokuji ni okimasu) = saya bangun pukul enam pagi. Partikel に menandai waktu tertentu.",
                            ],
                            [
                                'title' => 'Kosakata: tempat dan transportasi',
                                'category' => 'Kosakata',
                                'content' => "駅 / えき (eki) = stasiun\n学校 / がっこう (gakkou) = sekolah\n病院 / びょういん (byouin) = rumah sakit\n店 / みせ (mise) = toko\n図書館 / としょかん (toshokan) = perpustakaan\n家 / いえ (ie) = rumah\n電車 / でんしゃ (densha) = kereta\n地下鉄 / ちかてつ (chikatetsu) = kereta bawah tanah\nバス (basu) = bus\n自転車 / じてんしゃ (jitensha) = sepeda\n\nContoh: 電車で学校に行きます (densha de gakkou ni ikimasu) = saya pergi ke sekolah naik kereta. で menandai sarana atau cara; に menandai tujuan.",
                            ],
                            [
                                'title' => 'Kanji JLPT N4: waktu, tempat, dan kegiatan',
                                'category' => 'Kanji',
                                'content' => "Contoh Kanji tingkat dasar lanjutan (materi latihan; daftar JLPT dapat berbeda menurut sumber):\n\n海 (うみ umi / カイ kai) = laut; 海外 (かいがい kaigai) = luar negeri.\n風 (かぜ kaze / フウ fuu) = angin.\n駅 (えき eki) = stasiun; 東京駅 (とうきょうえき) = Stasiun Tokyo.\n室 (しつ shitsu) = ruangan; 教室 (きょうしつ kyoushitsu) = ruang kelas.\n題 (だい dai) = topik/soal; 問題 (もんだい mondai) = masalah/soal.\n試 (し shi) = mencoba; 試験 (しけん shiken) = ujian.\n旅 (たび tabi / リョ ryō) = perjalanan; 旅行 (りょこう ryokou) = bepergian.\n銀 (ぎん gin) = perak; 銀行 (ぎんこう ginkou) = bank.\n館 (かん kan) = gedung; 図書館 (としょかん toshokan) = perpustakaan.\n\nUrutan goresan: dahulukan garis mendatar sebelum garis tegak yang memotongnya; komponen atas ditulis sebelum komponen bawah. Contoh: 中 ditulis garis vertikal tengah, bingkai luar, lalu garis mendatar di dalam. Gunakan diagram animasi penulisan dari kamus Kanji untuk melihat urutan setiap karakter.",
                            ],
                            [
                                'title' => 'Kanji JLPT N3: kata dan bacaan kontekstual',
                                'category' => 'Kanji',
                                'content' => "Contoh Kanji tingkat menengah (target belajar N3; silabus dapat bervariasi):\n\n相 (あい ai / ソウ sou) = bersama; 相談 (そうだん soudan) = konsultasi.\n感 (かん kan) = perasaan; 感じる (かんじる kanjiru) = merasakan.\n研 (けん ken) = mengasah; 研究 (けんきゅう kenkyuu) = penelitian.\n経 (けい kei) = melewati; 経験 (けいけん keiken) = pengalaman.\n実 (み min / ジツ jitsu) = nyata; 実際 (じっさい jissai) = sebenarnya.\n急 (いそぐ isogu / キュウ kyuu) = buru-buru; 急行 (きゅうこう kyuukou) = ekspres.\n決 (きめる kimeru / ケツ ketsu) = memutuskan; 決める (きめる) = memutuskan.\n調 (しらべる shiraberu / チョウ chou) = menyelidiki; 調べる (しらべる) = memeriksa.\n\nBelajar satu kata gabungan sekaligus, bukan hanya karakter tunggal. Contoh: 日本語を研究しています (nihongo o kenkyuu shite imasu) = sedang meneliti bahasa Jepang. Garis utama umumnya ditulis dari kiri ke kanan dan atas ke bawah; cek diagram goresan untuk bentuk dengan komponen yang rumit.",
                            ],
                            [
                                'title' => 'Kanji JLPT N2: bacaan berita dan ungkapan',
                                'category' => 'Kanji',
                                'content' => "Contoh kosakata tingkat lanjut menengah (target belajar N2; pembagian level dapat berbeda antar bahan ajar):\n\n議 (ギ gi) = diskusi; 会議 (かいぎ kaigi) = rapat.\n政 (セイ sei) = pemerintahan; 政治 (せいじ seiji) = politik.\n経 (ケイ kei) = mengelola; 経済 (けいざい keizai) = ekonomi.\n際 (サイ sai) = kesempatan/batas; 国際 (こくさい kokusai) = internasional.\n報 (ホウ hou) = laporan; 情報 (じょうほう jouhou) = informasi.\n況 (キョウ kyou) = keadaan; 状況 (じょうきょう joukyou) = situasi.\n増 (ふえる fueru / ゾウ zou) = bertambah; 増加 (ぞうか zouka) = peningkatan.\n減 (へる heru / ゲン gen) = berkurang; 減少 (げんしょう genshou) = penurunan.\n\nContoh: 新しい情報を報告します (atarashii jouhou o houkoku shimasu) = melaporkan informasi baru. Perhatikan perubahan bunyi pada gabungan Kanji; cara baca paling tepat dipelajari melalui kata dan kalimat.",
                            ],
                            [
                                'title' => 'Kanji JLPT N1: bacaan formal dan akademik',
                                'category' => 'Kanji',
                                'content' => "Contoh kosakata tingkat mahir (target belajar N1; pembagian JLPT dapat bervariasi antar sumber):\n\n概 (ガイ gai) = garis besar; 概念 (がいねん gainen) = konsep.\n顕 (ケン ken) = jelas; 顕著 (けんちょ kencho) = menonjol.\n懸 (ケン ken) = menggantung; 懸念 (けねん kenen) = kekhawatiran.\n措 (ソ so) = menempatkan; 措置 (そち sochi) = langkah/tindakan.\n遵 (ジュン jun) = mengikuti; 遵守 (じゅんしゅ junshu) = kepatuhan.\n促 (うながす unagasu / ソク soku) = mendorong; 促進 (そくしん sokushin) = promosi/percepatan.\n弊 (ヘイ hei) = keburukan; 弊害 (へいがい heigai) = dampak buruk.\n\nContoh: 安全対策を実施する (anzen taisaku o jisshi suru) = melaksanakan langkah keselamatan. Saat belajar tingkat mahir, catat makna, kolokasi, ragam formal, dan contoh kalimat dari kamus tepercaya. Pelajari urutan goresan melalui animasi diagram; kaidah umum atas-ke-bawah dan kiri-ke-kanan tidak menggantikan diagram karakter spesifik.",
                            ],
                            [
                                'title' => 'Grammar: pola kalimat dan partikel は・が・の・も',
                                'category' => 'Grammar',
                                'content' => "Pola dasar bahasa Jepang adalah topik + informasi + predikat. Predikat biasanya berada di akhir.\n\nは (wa) menandai topik: わたしはアンです (Watashi wa An desu) = saya An.\nが (ga) menandai subjek/fokus baru: ねこがいます (Neko ga imasu) = ada kucing.\nの (no) menghubungkan kepunyaan/keterangan: わたしの本 (watashi no hon) = buku saya.\nも (mo) berarti “juga”: わたしも学生です (Watashi mo gakusei desu) = saya juga siswa.\n\nRumus: [topik] は [keterangan] です。\nRumus kepunyaan: [pemilik] の [benda].\n\nBedakan topik dan subjek melalui konteks. Contoh: 田中さんは先生です。学生は三人います (Tanaka-san wa sensei desu. Gakusei wa sannin imasu) = Tanaka adalah guru. Ada tiga siswa.\n\nLatihan: lengkapi わたし___本です (Ini buku saya). Jawaban: の. Dengarkan contoh Jepang dengan tombol suara.",
                            ],
                            [
                                'title' => 'Grammar: partikel を・に・で',
                                'category' => 'Grammar',
                                'content' => "を (o) menandai objek langsung kata kerja:\nPola: [objek] を [kata kerja].\nりんごを食べます (ringo o tabemasu) = makan apel.\n\nに (ni) menandai tujuan, waktu tertentu, atau penerima:\nPola tujuan: [tempat] に 行きます.\n学校に行きます (gakkou ni ikimasu) = pergi ke sekolah.\nPola waktu: 六時に起きます (rokuji ni okimasu) = bangun pukul enam.\n\nで (de) menandai tempat suatu aktivitas atau alat/sarana:\n図書館で勉強します (toshokan de benkyou shimasu) = belajar di perpustakaan.\nバスで行きます (basu de ikimasu) = pergi dengan bus.\n\nCatatan: に sering menunjuk tujuan atau titik waktu; で menjelaskan lokasi terjadinya kegiatan atau sarana. Latihan: がっこう___日本語___べんきょうします. Jawaban: で, を.",
                            ],
                            [
                                'title' => 'Grammar: kata kerja positif, negatif, dan lampau',
                                'category' => 'Grammar',
                                'content' => "Untuk pemula, gunakan bentuk sopan -ます.\n\n食べます (tabemasu) = makan.\n食べません (tabemasen) = tidak makan.\n食べました (tabemashita) = sudah makan.\n食べませんでした (tabemasen deshita) = tidak makan (lampau).\n\n行きます (ikimasu) = pergi; 行きません (ikimasen) = tidak pergi; 行きました (ikimashita) = sudah pergi; 行きませんでした (ikimasen deshita) = tidak pergi (lampau).\n\nRumus kalimat: [waktu] + [objek] を + [kata kerja]. Contoh: きのうパンを食べました (kinou pan o tabemashita) = kemarin makan roti.\n\nTanya: きょう学校に行きますか (kyou gakkou ni ikimasu ka) = apakah hari ini pergi ke sekolah? Jawaban positif: はい、行きます. Negatif: いいえ、行きません.\n\nLatihan: ubah のみます menjadi bentuk lampau negatif. Jawaban: のみませんでした.",
                            ],
                            [
                                'title' => 'Grammar: kata sifat い dan な',
                                'category' => 'Grammar',
                                'content' => "Kata sifat い: おいしい (oishii) = enak.\nPositif: おいしいです (oishii desu) = enak.\nNegatif: おいしくないです (oishiku nai desu) = tidak enak.\nLampau: おいしかったです (oishikatta desu) = dulu enak.\nLampau negatif: おいしくなかったです (oishiku nakatta desu) = dulu tidak enak.\n\nKata sifat な: しずか (shizuka) = tenang.\nPositif: しずかです (shizuka desu) = tenang.\nNegatif: しずかじゃありません (shizuka ja arimasen) = tidak tenang.\nLampau: しずかでした (shizuka deshita) = dulu tenang.\n\nSebelum kata benda: おいしいりんご (oishii ringo) = apel enak; しずかな町 (shizuka na machi) = kota yang tenang. Perhatikan bahwa kata sifat な memakai な sebelum kata benda.",
                            ],
                            [
                                'title' => 'Grammar: kalimat tanya dan percakapan sederhana',
                                'category' => 'Grammar',
                                'content' => "Bentuk pertanyaan sopan: [kalimat] か. Intonasi naik membantu, tetapi partikel か sudah menandai pertanyaan.\n\nこれは何ですか (Kore wa nan desu ka?) = ini apa?\nどこに行きますか (Doko ni ikimasu ka?) = pergi ke mana?\n何時ですか (Nanji desu ka?) = pukul berapa?\nいくらですか (Ikura desu ka?) = berapa harganya?\n\nPercakapan di toko:\nA: これはいくらですか (Kore wa ikura desu ka?) = ini berapa harganya?\nB: 千円です (Sen-en desu.) = seribu yen.\nA: ありがとうございます (Arigatou gozaimasu.) = terima kasih.\n\nPercakapan perkenalan:\nA: お名前は何ですか (Onamae wa nan desu ka?) = siapa nama Anda?\nB: アンです。よろしくお願いします (An desu. Yoroshiku onegaishimasu.) = saya An. Senang berkenalan.\n\nLatihan: jawab これは何ですか dengan ほんです (hon desu) = buku.",
                            ],
                        ];

        foreach ($materials as $material) {
            Material::firstOrCreate(
                ['title' => $material['title']],
                [
                    'category' => $material['category'],
                    'content' => $material['content'],
                    'content_format' => $material['content_format'] ?? 'text',
                ]
            );
        }

        $questions = [
            ['question' => 'Huruf Hiragana あ dibaca ...', 'options' => ['a', 'i', 'u', 'e'], 'correct_answer' => 'a', 'category' => 'Hiragana'],
            ['question' => 'Apa arti ありがとう?', 'options' => ['Halo', 'Terima kasih', 'Permisi', 'Selamat malam'], 'correct_answer' => 'Terima kasih', 'category' => 'Kosakata'],
            ['question' => 'Huruf き dibaca ...', 'options' => ['ka', 'ki', 'ku', 'ke'], 'correct_answer' => 'ki', 'category' => 'Hiragana'],
            ['question' => 'Huruf し dibaca ...', 'options' => ['sa', 'shi', 'su', 'se'], 'correct_answer' => 'shi', 'category' => 'Hiragana'],
            ['question' => 'Huruf つ dibaca ...', 'options' => ['ta', 'chi', 'tsu', 'to'], 'correct_answer' => 'tsu', 'category' => 'Hiragana'],
            ['question' => 'Huruf ぬ dibaca ...', 'options' => ['ne', 'nu', 'no', 'na'], 'correct_answer' => 'nu', 'category' => 'Hiragana'],
            ['question' => 'Huruf ほ dibaca ...', 'options' => ['ha', 'hi', 'fu', 'ho'], 'correct_answer' => 'ho', 'category' => 'Hiragana'],
            ['question' => 'Huruf ざ dibaca ...', 'options' => ['sa', 'za', 'ja', 'da'], 'correct_answer' => 'za', 'category' => 'Hiragana'],
            ['question' => 'Huruf で dibaca ...', 'options' => ['te', 'de', 'do', 'to'], 'correct_answer' => 'de', 'category' => 'Hiragana'],
            ['question' => 'Huruf ぱ dibaca ...', 'options' => ['ba', 'pa', 'ha', 'bo'], 'correct_answer' => 'pa', 'category' => 'Hiragana'],
            ['question' => 'Huruf ぎ dibaca ...', 'options' => ['ki', 'gi', 'ji', 'ge'], 'correct_answer' => 'gi', 'category' => 'Hiragana'],
            ['question' => 'Huruf ちょ dibaca ...', 'options' => ['cho', 'chu', 'sho', 'kyo'], 'correct_answer' => 'cho', 'category' => 'Hiragana'],
            ['question' => 'Huruf きゅ dibaca ...', 'options' => ['kya', 'kyu', 'kyo', 'ku'], 'correct_answer' => 'kyu', 'category' => 'Hiragana'],
            ['question' => 'Huruf しゅ dibaca ...', 'options' => ['sha', 'shu', 'sho', 'chu'], 'correct_answer' => 'shu', 'category' => 'Hiragana'],
            ['question' => 'Apa fungsi っ kecil pada kata きって?', 'options' => ['Memanjangkan vokal', 'Menggandakan konsonan berikutnya', 'Mengubahnya menjadi kata jamak', 'Tidak memiliki bunyi atau fungsi'], 'correct_answer' => 'Menggandakan konsonan berikutnya', 'category' => 'Hiragana'],
            ['question' => 'Kata がっこう dibaca ...', 'options' => ['gakkou', 'gakou', 'gakkai', 'gatsukou'], 'correct_answer' => 'gakkou', 'category' => 'Hiragana'],
            ['question' => 'Urutan Hiragana untuk bunyi “ne-ko” adalah ...', 'options' => ['ねこ', 'のこ', 'ねき', 'ぬこ'], 'correct_answer' => 'ねこ', 'category' => 'Hiragana'],
            ['question' => 'Huruf Hiragana yang berbunyi “fu” adalah ...', 'options' => ['ふ', 'ほ', 'へ', 'は'], 'correct_answer' => 'ふ', 'category' => 'Hiragana'],
            ['question' => 'Huruf Hiragana yang berbunyi “yo” adalah ...', 'options' => ['ゆ', 'よ', 'や', 'ろ'], 'correct_answer' => 'よ', 'category' => 'Hiragana'],
            ['question' => 'Manakah penulisan Hiragana yang benar untuk bunyi “ka-ki-ku”?', 'options' => ['かきく', 'きかく', 'くきか', 'かくき'], 'correct_answer' => 'かきく', 'category' => 'Hiragana'],

            ['question' => 'Huruf ア dibaca ...', 'options' => ['a', 'i', 'u', 'e'], 'correct_answer' => 'a', 'category' => 'Katakana'],
            ['question' => 'Huruf キ dibaca ...', 'options' => ['ka', 'ki', 'ku', 'ke'], 'correct_answer' => 'ki', 'category' => 'Katakana'],
            ['question' => 'Huruf シ dibaca ...', 'options' => ['sa', 'shi', 'su', 'so'], 'correct_answer' => 'shi', 'category' => 'Katakana'],
            ['question' => 'Huruf ツ dibaca ...', 'options' => ['chi', 'tsu', 'te', 'to'], 'correct_answer' => 'tsu', 'category' => 'Katakana'],
            ['question' => 'Huruf ン dibaca ...', 'options' => ['so', 'n', 'no', 'mu'], 'correct_answer' => 'n', 'category' => 'Katakana'],
            ['question' => 'Huruf ソ dibaca ...', 'options' => ['n', 'so', 'shi', 'tsu'], 'correct_answer' => 'so', 'category' => 'Katakana'],
            ['question' => 'Huruf ガ dibaca ...', 'options' => ['ka', 'ga', 'gi', 'gu'], 'correct_answer' => 'ga', 'category' => 'Katakana'],
            ['question' => 'Huruf ペ dibaca ...', 'options' => ['be', 'pe', 'he', 'pu'], 'correct_answer' => 'pe', 'category' => 'Katakana'],
            ['question' => 'Huruf キャ dibaca ...', 'options' => ['kya', 'kyu', 'sha', 'cha'], 'correct_answer' => 'kya', 'category' => 'Katakana'],
            ['question' => 'Huruf シュ dibaca ...', 'options' => ['shu', 'sho', 'chu', 'kyu'], 'correct_answer' => 'shu', 'category' => 'Katakana'],
            ['question' => 'Apa arti kata コーヒー?', 'options' => ['Teh', 'Kopi', 'Susu', 'Roti'], 'correct_answer' => 'Kopi', 'category' => 'Katakana'],
            ['question' => 'Apa arti kata テレビ?', 'options' => ['Televisi', 'Telepon', 'Komputer', 'Radio'], 'correct_answer' => 'Televisi', 'category' => 'Katakana'],
            ['question' => 'Apa arti kata パン?', 'options' => ['Nasi', 'Roti', 'Air', 'Ikan'], 'correct_answer' => 'Roti', 'category' => 'Katakana'],
            ['question' => 'Apa arti kata ホテル?', 'options' => ['Rumah', 'Sekolah', 'Hotel', 'Restoran'], 'correct_answer' => 'Hotel', 'category' => 'Katakana'],
            ['question' => 'Apa arti kata バス?', 'options' => ['Bus', 'Taksi', 'Kereta', 'Sepeda'], 'correct_answer' => 'Bus', 'category' => 'Katakana'],
            ['question' => 'Apa arti kata タクシー?', 'options' => ['Taksi', 'Bus', 'Pesawat', 'Kapal'], 'correct_answer' => 'Taksi', 'category' => 'Katakana'],
            ['question' => 'Apa fungsi tanda ー dalam kata コーヒー?', 'options' => ['Menggandakan konsonan', 'Memanjangkan vokal sebelumnya', 'Menandai kata tanya', 'Menghilangkan vokal'], 'correct_answer' => 'Memanjangkan vokal sebelumnya', 'category' => 'Katakana'],
            ['question' => 'Manakah Katakana untuk bunyi “to”?', 'options' => ['テ', 'ト', 'ツ', 'タ'], 'correct_answer' => 'ト', 'category' => 'Katakana'],

            ['question' => 'Apa arti おはようございます?', 'options' => ['Selamat pagi', 'Selamat siang', 'Selamat malam', 'Sampai jumpa'], 'correct_answer' => 'Selamat pagi', 'category' => 'Kosakata'],
            ['question' => 'Ungkapan こんばんは digunakan untuk mengucapkan ...', 'options' => ['Selamat pagi', 'Selamat malam', 'Terima kasih', 'Permisi'], 'correct_answer' => 'Selamat malam', 'category' => 'Kosakata'],
            ['question' => 'Apa arti すみません?', 'options' => ['Terima kasih', 'Permisi atau maaf', 'Selamat pagi', 'Sampai jumpa'], 'correct_answer' => 'Permisi atau maaf', 'category' => 'Kosakata'],
            ['question' => 'Apa arti はい?', 'options' => ['Tidak', 'Ya', 'Maaf', 'Tolong'], 'correct_answer' => 'Ya', 'category' => 'Kosakata'],
            ['question' => 'Apa arti いいえ?', 'options' => ['Ya', 'Tidak', 'Terima kasih', 'Halo'], 'correct_answer' => 'Tidak', 'category' => 'Kosakata'],
            ['question' => 'Bahasa Jepang untuk “air” adalah ...', 'options' => ['みず', 'ねこ', 'いぬ', 'ともだち'], 'correct_answer' => 'みず', 'category' => 'Kosakata'],
            ['question' => 'Apa arti ねこ?', 'options' => ['Anjing', 'Kucing', 'Burung', 'Ikan'], 'correct_answer' => 'Kucing', 'category' => 'Kosakata'],
            ['question' => 'Apa arti いぬ?', 'options' => ['Kucing', 'Anjing', 'Kuda', 'Kelinci'], 'correct_answer' => 'Anjing', 'category' => 'Kosakata'],
            ['question' => 'Bahasa Jepang untuk “sekolah” adalah ...', 'options' => ['がっこう', 'せんせい', 'ともだち', 'みず'], 'correct_answer' => 'がっこう', 'category' => 'Kosakata'],
            ['question' => 'Apa arti せんせい?', 'options' => ['Siswa', 'Guru', 'Teman', 'Orang tua'], 'correct_answer' => 'Guru', 'category' => 'Kosakata'],
            ['question' => 'Apa arti ともだち?', 'options' => ['Keluarga', 'Teman', 'Guru', 'Tetangga'], 'correct_answer' => 'Teman', 'category' => 'Kosakata'],
            ['question' => 'Apa arti たべます?', 'options' => ['Minum', 'Makan', 'Tidur', 'Belajar'], 'correct_answer' => 'Makan', 'category' => 'Kosakata'],
            ['question' => 'Apa arti のみます?', 'options' => ['Makan', 'Minum', 'Pergi', 'Datang'], 'correct_answer' => 'Minum', 'category' => 'Kosakata'],
            ['question' => 'Apa arti いくらですか?', 'options' => ['Siapa namamu?', 'Berapa harganya?', 'Di mana sekolah?', 'Jam berapa sekarang?'], 'correct_answer' => 'Berapa harganya?', 'category' => 'Kosakata'],
            ['question' => 'Angka さん berarti ...', 'options' => ['Satu', 'Dua', 'Tiga', 'Empat'], 'correct_answer' => 'Tiga', 'category' => 'Kosakata'],
            ['question' => 'Apa arti わたし?', 'options' => ['Kamu', 'Saya', 'Dia', 'Mereka'], 'correct_answer' => 'Saya', 'category' => 'Kosakata'],
            ['question' => 'Ungkapan ありがとう berarti ...', 'options' => ['Maaf', 'Terima kasih', 'Selamat malam', 'Permisi'], 'correct_answer' => 'Terima kasih', 'category' => 'Kosakata'],
            ['question' => 'Apa arti こんにちは?', 'options' => ['Halo atau selamat siang', 'Selamat malam', 'Selamat pagi', 'Sampai besok'], 'correct_answer' => 'Halo atau selamat siang', 'category' => 'Kosakata'],
            ['question' => 'Apa arti Kanji 山?', 'options' => ['Sungai', 'Gunung', 'Pohon', 'Bulan'], 'correct_answer' => 'Gunung', 'category' => 'Kanji'],
            ['question' => 'Bagaimana kunyomi Kanji 日 yang berarti matahari?', 'options' => ['ひ (hi)', 'つき (tsuki)', 'やま (yama)', 'かわ (kawa)'], 'correct_answer' => 'ひ (hi)', 'category' => 'Kanji'],
            ['question' => 'Kanji 水 berarti ...', 'options' => ['Api', 'Air', 'Orang', 'Hari'], 'correct_answer' => 'Air', 'category' => 'Kanji'],
            ['question' => 'Partikel を pada パンをたべます menandai ...', 'options' => ['Topik', 'Objek', 'Tempat', 'Kepunyaan'], 'correct_answer' => 'Objek', 'category' => 'Grammar'],
            ['question' => 'Apa arti わたしもがくせいです?', 'options' => ['Saya seorang guru', 'Saya juga siswa', 'Saya makan nasi', 'Saya pergi ke sekolah'], 'correct_answer' => 'Saya juga siswa', 'category' => 'Grammar'],
            ['question' => 'Kanji 駅 berarti ...', 'options' => ['Sekolah', 'Stasiun', 'Rumah sakit', 'Perpustakaan'], 'correct_answer' => 'Stasiun', 'category' => 'Kanji', 'level' => 'N4'],
            ['question' => 'Apa arti 旅行 (りょこう)?', 'options' => ['Perjalanan', 'Ujian', 'Informasi', 'Angin'], 'correct_answer' => 'Perjalanan', 'category' => 'Kosakata', 'level' => 'N4'],
            ['question' => 'Kalimat 図書館で勉強します memakai で untuk menandai ...', 'options' => ['Pemilik buku', 'Tempat kegiatan belajar', 'Waktu belajar', 'Objek yang dibaca'], 'correct_answer' => 'Tempat kegiatan belajar', 'category' => 'Grammar', 'level' => 'N4'],
            ['question' => 'Apa arti 経験 (けいけん)?', 'options' => ['Pengalaman', 'Perjalanan', 'Penurunan', 'Perpustakaan'], 'correct_answer' => 'Pengalaman', 'category' => 'Kanji', 'level' => 'N3'],
            ['question' => 'Apa arti kata 相談 (そうだん)?', 'options' => ['Konsultasi', 'Peningkatan', 'Ekonomi', 'Pemerintahan'], 'correct_answer' => 'Konsultasi', 'category' => 'Kosakata', 'level' => 'N3'],
            ['question' => 'Kata sifat おいしい dalam bentuk negatif adalah ...', 'options' => ['おいしくないです', 'おいしいでした', 'おいしくでした', 'おいしなです'], 'correct_answer' => 'おいしくないです', 'category' => 'Grammar', 'level' => 'N3'],
            ['question' => 'Apa arti 情報 (じょうほう)?', 'options' => ['Informasi', 'Kekhawatiran', 'Kepatuhan', 'Konsep'], 'correct_answer' => 'Informasi', 'category' => 'Kanji', 'level' => 'N2'],
            ['question' => 'Apa arti 減少 (げんしょう)?', 'options' => ['Peningkatan', 'Penurunan', 'Perjalanan', 'Keputusan'], 'correct_answer' => 'Penurunan', 'category' => 'Kosakata', 'level' => 'N2'],
            ['question' => 'Bentuk lampau negatif sopan dari 行きます adalah ...', 'options' => ['行きませんでした', '行きましたです', '行きないでした', '行きませんです'], 'correct_answer' => '行きませんでした', 'category' => 'Grammar', 'level' => 'N2'],
            ['question' => 'Apa arti 概念 (がいねん)?', 'options' => ['Konsep', 'Tindakan', 'Kepatuhan', 'Dampak buruk'], 'correct_answer' => 'Konsep', 'category' => 'Kanji', 'level' => 'N1'],
            ['question' => 'Apa arti 遵守 (じゅんしゅ)?', 'options' => ['Kepatuhan', 'Konsultasi', 'Pengalaman', 'Informasi'], 'correct_answer' => 'Kepatuhan', 'category' => 'Kosakata', 'level' => 'N1'],
            ['question' => 'Apa arti 懸念 (けねん) dalam konteks bacaan formal?', 'options' => ['Kekhawatiran', 'Peningkatan', 'Perjalanan', 'Kesimpulan'], 'correct_answer' => 'Kekhawatiran', 'category' => 'Grammar', 'level' => 'N1'],
        ];

        foreach ($questions as $question) {
            Question::firstOrCreate(
                ['question' => $question['question']],
                [
                    'options' => $question['options'],
                    'correct_answer' => $question['correct_answer'],
                    'category' => $question['category'],
                    'level' => $question['level'] ?? 'N5',
                ]
            );
        }
    }
}

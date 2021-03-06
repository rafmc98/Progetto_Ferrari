PGDMP         '                x           PassioneFerrari    12.3    12.3 2    S           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            T           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            U           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            V           1262    16458    PassioneFerrari    DATABASE     �   CREATE DATABASE "PassioneFerrari" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United Kingdom.1252' LC_CTYPE = 'English_United Kingdom.1252';
 !   DROP DATABASE "PassioneFerrari";
                postgres    false            �            1259    16459    eventi    TABLE     �   CREATE TABLE public.eventi (
    idevento integer NOT NULL,
    titolo text,
    img_evento text,
    descrizione_evento text,
    video text,
    pilota integer NOT NULL
);
    DROP TABLE public.eventi;
       public         heap    postgres    false            �            1259    16465    macchine    TABLE     �   CREATE TABLE public.macchine (
    id integer NOT NULL,
    nome text,
    tipo text,
    img text,
    anno integer,
    lunghezza text,
    larghezza text,
    peso text,
    altezza text,
    img2 text,
    img3 text
);
    DROP TABLE public.macchine;
       public         heap    postgres    false            �            1259    16471    ordini    TABLE     �   CREATE TABLE public.ordini (
    "idOrdine" integer NOT NULL,
    email character varying(40) NOT NULL,
    nomeprodotto text,
    "quantità" integer,
    data date,
    idprodotto integer,
    prezzo integer
);
    DROP TABLE public.ordini;
       public         heap    postgres    false            �            1259    16477    ordini_idOrdine_seq    SEQUENCE     �   CREATE SEQUENCE public."ordini_idOrdine_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public."ordini_idOrdine_seq";
       public          postgres    false    204            W           0    0    ordini_idOrdine_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public."ordini_idOrdine_seq" OWNED BY public.ordini."idOrdine";
          public          postgres    false    205            �            1259    16479    piloti    TABLE       CREATE TABLE public.piloti (
    id integer NOT NULL,
    nome text,
    cognome text,
    "data nascita" date,
    altezza double precision,
    "nazionalità" text,
    gare integer,
    vittorie integer,
    img text,
    mondiali integer,
    descrizione text
);
    DROP TABLE public.piloti;
       public         heap    postgres    false            �            1259    16485    piloti_macchine    TABLE     h   CREATE TABLE public.piloti_macchine (
    idpiloti integer NOT NULL,
    idmacchine integer NOT NULL
);
 #   DROP TABLE public.piloti_macchine;
       public         heap    postgres    false            �            1259    16488    prodotti    TABLE     �   CREATE TABLE public.prodotti (
    idprodotto integer NOT NULL,
    nomeprodotto text,
    descrizione text,
    quantity integer,
    imgprodotto text,
    prezzo integer
);
    DROP TABLE public.prodotti;
       public         heap    postgres    false            �            1259    16494 
   recensioni    TABLE     �   CREATE TABLE public.recensioni (
    idrecensione integer NOT NULL,
    titolo text,
    descrizione text,
    stelle integer,
    data date,
    email character varying(50) NOT NULL,
    idprodotto integer
);
    DROP TABLE public.recensioni;
       public         heap    postgres    false            �            1259    16500    recensioni_idRecensione_seq    SEQUENCE     �   CREATE SEQUENCE public."recensioni_idRecensione_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public."recensioni_idRecensione_seq";
       public          postgres    false    209            X           0    0    recensioni_idRecensione_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."recensioni_idRecensione_seq" OWNED BY public.recensioni.idrecensione;
          public          postgres    false    210            �            1259    16563    storie    TABLE     �   CREATE TABLE public.storie (
    id integer NOT NULL,
    sfondo text,
    titolo text,
    box text,
    pop text,
    image text,
    descrizione text,
    video text
);
    DROP TABLE public.storie;
       public         heap    postgres    false            �            1259    16561    storie_id_seq    SEQUENCE     �   CREATE SEQUENCE public.storie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.storie_id_seq;
       public          postgres    false    213            Y           0    0    storie_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.storie_id_seq OWNED BY public.storie.id;
          public          postgres    false    212            �            1259    16502    utenze    TABLE     �   CREATE TABLE public.utenze (
    email character varying(40) NOT NULL,
    name character varying(20),
    surname character varying(40),
    password character varying(40),
    punteggio integer,
    img text
);
    DROP TABLE public.utenze;
       public         heap    postgres    false            �
           2604    16508    ordini idOrdine    DEFAULT     v   ALTER TABLE ONLY public.ordini ALTER COLUMN "idOrdine" SET DEFAULT nextval('public."ordini_idOrdine_seq"'::regclass);
 @   ALTER TABLE public.ordini ALTER COLUMN "idOrdine" DROP DEFAULT;
       public          postgres    false    205    204            �
           2604    16509    recensioni idrecensione    DEFAULT     �   ALTER TABLE ONLY public.recensioni ALTER COLUMN idrecensione SET DEFAULT nextval('public."recensioni_idRecensione_seq"'::regclass);
 F   ALTER TABLE public.recensioni ALTER COLUMN idrecensione DROP DEFAULT;
       public          postgres    false    210    209            �
           2604    16566 	   storie id    DEFAULT     f   ALTER TABLE ONLY public.storie ALTER COLUMN id SET DEFAULT nextval('public.storie_id_seq'::regclass);
 8   ALTER TABLE public.storie ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            E          0    16459    eventi 
   TABLE DATA           a   COPY public.eventi (idevento, titolo, img_evento, descrizione_evento, video, pilota) FROM stdin;
    public          postgres    false    202   c:       F          0    16465    macchine 
   TABLE DATA           n   COPY public.macchine (id, nome, tipo, img, anno, lunghezza, larghezza, peso, altezza, img2, img3) FROM stdin;
    public          postgres    false    203   �@       G          0    16471    ordini 
   TABLE DATA           h   COPY public.ordini ("idOrdine", email, nomeprodotto, "quantità", data, idprodotto, prezzo) FROM stdin;
    public          postgres    false    204   �D       I          0    16479    piloti 
   TABLE DATA           �   COPY public.piloti (id, nome, cognome, "data nascita", altezza, "nazionalità", gare, vittorie, img, mondiali, descrizione) FROM stdin;
    public          postgres    false    206   �D       J          0    16485    piloti_macchine 
   TABLE DATA           ?   COPY public.piloti_macchine (idpiloti, idmacchine) FROM stdin;
    public          postgres    false    207   �N       K          0    16488    prodotti 
   TABLE DATA           h   COPY public.prodotti (idprodotto, nomeprodotto, descrizione, quantity, imgprodotto, prezzo) FROM stdin;
    public          postgres    false    208   eO       L          0    16494 
   recensioni 
   TABLE DATA           h   COPY public.recensioni (idrecensione, titolo, descrizione, stelle, data, email, idprodotto) FROM stdin;
    public          postgres    false    209   )S       P          0    16563    storie 
   TABLE DATA           Y   COPY public.storie (id, sfondo, titolo, box, pop, image, descrizione, video) FROM stdin;
    public          postgres    false    213   �U       N          0    16502    utenze 
   TABLE DATA           P   COPY public.utenze (email, name, surname, password, punteggio, img) FROM stdin;
    public          postgres    false    211   ]       Z           0    0    ordini_idOrdine_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public."ordini_idOrdine_seq"', 105, true);
          public          postgres    false    205            [           0    0    recensioni_idRecensione_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public."recensioni_idRecensione_seq"', 36, true);
          public          postgres    false    210            \           0    0    storie_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.storie_id_seq', 1, false);
          public          postgres    false    212            �
           2606    16511    eventi Eventi_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT "Eventi_pkey" PRIMARY KEY (idevento);
 >   ALTER TABLE ONLY public.eventi DROP CONSTRAINT "Eventi_pkey";
       public            postgres    false    202            �
           2606    16513    macchine Macchine_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.macchine
    ADD CONSTRAINT "Macchine_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.macchine DROP CONSTRAINT "Macchine_pkey";
       public            postgres    false    203            �
           2606    16515 $   piloti_macchine Piloti_Macchine_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT "Piloti_Macchine_pkey" PRIMARY KEY (idpiloti, idmacchine);
 P   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT "Piloti_Macchine_pkey";
       public            postgres    false    207    207            �
           2606    16517    piloti Piloti_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.piloti
    ADD CONSTRAINT "Piloti_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.piloti DROP CONSTRAINT "Piloti_pkey";
       public            postgres    false    206            �
           2606    16519    ordini ordini_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.ordini
    ADD CONSTRAINT ordini_pkey PRIMARY KEY ("idOrdine");
 <   ALTER TABLE ONLY public.ordini DROP CONSTRAINT ordini_pkey;
       public            postgres    false    204            �
           2606    16521    prodotti prodotti_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.prodotti
    ADD CONSTRAINT prodotti_pkey PRIMARY KEY (idprodotto);
 @   ALTER TABLE ONLY public.prodotti DROP CONSTRAINT prodotti_pkey;
       public            postgres    false    208            �
           2606    16523    recensioni recensioni_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.recensioni
    ADD CONSTRAINT recensioni_pkey PRIMARY KEY (idrecensione);
 D   ALTER TABLE ONLY public.recensioni DROP CONSTRAINT recensioni_pkey;
       public            postgres    false    209            �
           2606    16571    storie storie_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.storie
    ADD CONSTRAINT storie_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.storie DROP CONSTRAINT storie_pkey;
       public            postgres    false    213            �
           2606    16525    utenze utenze_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenze
    ADD CONSTRAINT utenze_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenze DROP CONSTRAINT utenze_pkey;
       public            postgres    false    211            �
           2606    16526    recensioni email    FK CONSTRAINT     q   ALTER TABLE ONLY public.recensioni
    ADD CONSTRAINT email FOREIGN KEY (email) REFERENCES public.utenze(email);
 :   ALTER TABLE ONLY public.recensioni DROP CONSTRAINT email;
       public          postgres    false    2749    209    211            �
           2606    16531    ordini emailUtente    FK CONSTRAINT     u   ALTER TABLE ONLY public.ordini
    ADD CONSTRAINT "emailUtente" FOREIGN KEY (email) REFERENCES public.utenze(email);
 >   ALTER TABLE ONLY public.ordini DROP CONSTRAINT "emailUtente";
       public          postgres    false    204    211    2749            �
           2606    16536    ordini idProdotto    FK CONSTRAINT     �   ALTER TABLE ONLY public.ordini
    ADD CONSTRAINT "idProdotto" FOREIGN KEY (idprodotto) REFERENCES public.prodotti(idprodotto);
 =   ALTER TABLE ONLY public.ordini DROP CONSTRAINT "idProdotto";
       public          postgres    false    204    2745    208            �
           2606    16541    recensioni idProdotto    FK CONSTRAINT     �   ALTER TABLE ONLY public.recensioni
    ADD CONSTRAINT "idProdotto" FOREIGN KEY (idprodotto) REFERENCES public.prodotti(idprodotto);
 A   ALTER TABLE ONLY public.recensioni DROP CONSTRAINT "idProdotto";
       public          postgres    false    208    209    2745            �
           2606    16546    piloti_macchine idmacchine    FK CONSTRAINT        ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idmacchine FOREIGN KEY (idmacchine) REFERENCES public.macchine(id);
 D   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idmacchine;
       public          postgres    false    207    2737    203            �
           2606    16551    piloti_macchine idpiloti    FK CONSTRAINT     y   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idpiloti FOREIGN KEY (idpiloti) REFERENCES public.piloti(id);
 B   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idpiloti;
       public          postgres    false    2741    206    207            �
           2606    16556    eventi pilota    FK CONSTRAINT     l   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT pilota FOREIGN KEY (pilota) REFERENCES public.piloti(id);
 7   ALTER TABLE ONLY public.eventi DROP CONSTRAINT pilota;
       public          postgres    false    202    2741    206            E   z  x��X�R�H<�|E�b�`�pĎ�K��`M�'_
�g�u�[�����q������F����YYY%����u�3�[g�hfte���p�К-������^�ծg7V�\�ԧ�TU�Z�y"eHU�mI�ڨ�s�T�Vִ!۱b��^7�ɋ������9t؄'�A[�<Vd-c�1�77�J��
���)OM���b�n:2���Z�7]�h���r~2��3�9Ǳ_`PY���>ީ����ի�ڬٽV�R6l+-���"����]K�Gw.�	��-����[��4Z�m�5���㔼��;��m��hU�~���^rvՇ��X���<��[}�i߰����� NC%�G϶˺�E>�q�>�{��N�-l���E����B��׸J�Hdz��q@Vr�N�D�'�˳�g+��V� ���s�<����(���wrU�t��Xs�	j	Y����^P�.�}A�L�A��jS�k��w��%H��kpS�+g�� ~B�kp!����NS�WB�đv�!V�g'Sf��?�/��ڃh�D��1��N�~�4�f� �ˁ״�G�oxm���� �/�ˣ�|�%�љ�zur�X�gP��R�!�E#��Ί"F���5�y�Y��ݕH��(x7�T27�'���Ymw�!\��+��w�wn����[�G�.e+��0��/$̉Y�yk�����w�P��{O��(��e���&!V��,5$�+� X�U��d-����2%}öM��:
s8V�z�v�|9�1J.�6�ps^8��-�%;�i�\�#�,�#)�'����m6ڲ�u)ˁu�c��<d��#��}�DW�	�(�Σ�5*�#D��1�z{�>Gf�hy|P�d��9�v��H�
��z�4!�)��@M�o@NV~�oN��
��t�(����|�L5Cc�hKy1���x"a�m�%iN
�F<���NO�`{�*b�l��%�l ��@�.�e�O@�9��6D�p:��J��>E:����L��b4Y�}�eI��#p�oc{� ���@H2':0;�q��%FPj*�_<;�:
�bzq�=�S���[�Up�������X�u�5�録u��0|jٜ���ƄX��4�Б�|{�鋿*�km���V�*nZ���~-!��FӁm\�/LA����5�iXg39�CEp6_�"�
���Ů��vqY�<��*����jt��,�\z�����}�P=��ej�N�Q8���qE10?IU��d�(�ާ��|�ҵ� �c�[��8�P\a���w�_:���(���6,����@�D��L1�G���qۄ��es��|d��N����u�gݓO�5�Y9�7j�t.5/��ah�w(�΄�I#����؝��g ���Q'~܋�FR�.#u��)q-//���p��ezz������(�Cq>_�Qd� c���0^�G�����$�6��U�4�͔kW.T�'�7ȩ7�v�H�t4�K�<�AA�7N��`���X�>$�K(	;@�$�`�b�%}������!ã�>&�LT���S ��~tu�oDi���u�.�p��p�����ׇ>�����j����pG	�Z���F!�6T&N�m)�K�:�a�o�����/U7b&�m1�����\      F   �  x��W�r1=+_���Z�p0p��"9r�@&e��m.|=�eF�i��>��T=O�wI)6����8��n7<o_��G	���o�B�jP�v����k��yR�6f*�5F�����7���0�Z��"Z��ָD���!��gL×-W�̜ņ>���VJ��3
��Zc��'��q��L�@�}��"<��,2X�cA3�RQ$�DBI�Z�"2�� �1�5BO#Li�a�4����BG]��IM鉞�'�ʅ��3	Jv,C	+)J�̕�LP&'i���h��E��3Bi��kBGY#g�6E.ۭ3�	u=���)�f�ʟ=�0	4�l����g9�>_��`g�Z��N;ù�Ş"4�FB�ҝ��Kf�l����(��=t�Z�+�EC�/�%CAl4�:�ϻ��g}Y�TX�ҭB���\r�Ǟ7�;�t+wJ��Ǟ?!�I��9F��S3w� {��v����L�������8������+�`�d�	��>5l�kخ��;_�+�ɮӰ�$��ϤaQ4wQC�k�h�q�)ae:�N���N_�Բ]G�.�!�����y ������D�´U ~������ ^3t�e�6�%�$C�q��1P��(�d��HX!�Vcy��:�!\�S�S�Λ!�����l���n�2F�_t� �Ć+ڭ�"Tb�����4|��|=ţC<���Dվ�_�Q�Y%���0_]`qR�aR�^��a�m�n�ǜ���3R8�ꬦc�+)\��Œ��bZ|����˞��w�a3�Mns2`��%��5�h>��JsV�M���������J�[�h�vy�Dh�(�xV��i����,�<yM�`K^!-A{KB�e.�����)�����5��5�Ku����0���˧�[���~ �2%�m������w��ˉ1\$�M��)�� ���l�3�~"VD���?��������tҾbK��W,J�0W�}=�w������?��q      G      x������ � �      I   �	  x��X�r�]���U�����-�vƚ����xu�$��ts�Y����,��d��Te�?�/ɹ�EIOQM6pq�瞋it��,�?��Ry��/W�?���j�U�����t�D�Yt�e_颐[]����_��h�I^��S��*wJ�������:�\��]ԥ���TRȺ2��ӹ��ԈJeʥ&{e�\L^)��ҩ���ϲ�kS*������u.E"F�I2�>��
Ef��O�����+vW���U�;�`봰*56�Ee�Hk-��*�Y�r�),�9����js�P"X1�@fBB�8h@��%���Z�
J5�VּR�����q���8N`�é%����
-�_e](���벂=2M�@�C���r�3���^;�N:��]�J+X'�t�6{�x��-����Y�q����B�%��4�ȜǴqk�0{�
;���nϬ݃���@�3�$nt��Xr���BB_���.�d��C���}.TFy	S+ej=<t�AW�k�\`G�U���	 :��#����|,������J��?|1>�E_�BG���>(Q���E2�HVT���Z���,�f�"�&�m�v�������ȋ�
u����xy�o��7noPlɊ���!��gjt�5PN�ϖ���d��ݫ~�Ո�C�S���˱r�gcudI'�"��[Y�)��M�AZU��SՎ�����j1��V¤�tP��I���ׂ�Y�����9����i�����|#�GS(3(M$,���Suq����^�Gf�$�5���U��5��]��� x*]Q�k�3R����Sy �� ;��Fy���H�Ba?��t�;K)'*@�=�*��AN!�����b��'��/�A$����Nv� Pc��) �u��m��0�FR������P}������>o2��~N�@�y�M���;Fje%)"б�}֚���B/�o�J�����B3�5
�M�i`�6/�)*��o��2v�ܹ����0�GUE�`G�B��� ��˱�R��a�ݝ:�?XyY���D,� ���K/��m|6��$wD/s�!�s��	���v/�%��<�M#ɋ:h�����(�E���ɟ��ۃVl��{�!y��t�)������v_�t_��,�p�˥5J]��*%�,^��ŷ�2|P�F����3�UW�G ��׏g�<����V�*����@�taW�)�hd/s��W^ӱ����\��&}�ľmnkl" Dw�ҍ�}lZĪǗ���S��Qh*�%�2���h�xs������|�}�SԊ�"��g(9M>���I�J�ŧ�A�I	��y���BM"�����:��2M_�j��"�2��x�Q�J������[I���)_B���F�a����ꖏ'�ir>e-<��x;Е3�߼��:.M�x�e�[�J�(B���W�9�x��#DW�l��||�r�WэtN��_L ��2zeђsMW�(I��u��_7&A�`1btKX-���!�B�ĸ��0��^m��y]n��~9��i��,oI��J�Y���A{��%m[�iOLPK�I���BX��od��*�}%� H�&�}��cqu�^�ۃ��cv�+�l|��1���$z��H?�ʾ�M����<�����d�W쥭�����Yo6Q)Y �˪�	]�ϖ�@�<�|�\\�/&I���;�\F�$r��.#��8-WѩI���m��!�TJ�e˖a��������k�����6Os��`4c��$n|��+����;�Di#�U�(_aL�x�I�빠�[/(Bcj��TCt��G\��	��'S����������k���/�׳0��!���ҍ��!�O�"bR�N5w#��9���<q�1;�A� ��Ë���Wt�Y���߄9Hʠ��h䄲ca��� ���<��d��~"��������za.k�$݃<3��O�O�����'�����r���]�`��C˃������}����v�kY2�m��9As!m*=@�m?�뉴'�40u����!��gdeh���\���|*��������k����՟����A,Q�#]eI�}$���Q#��ߒѰjY��G��c�ő��0���f�2�	2�W�Ayi��Oo5]���KnG`�`"T -"���ġh�ᶉ��H@k
?o	���X��[���%�띴�r���0�^�Ȓ�y� �Sͧ!r��C���,P� KYO3$��J��#�}�݌|�ǰ;��Wq�����1�_"���o0͙���es�p�=�/S����6�����v~�.*#׉�:#"/���5ztV�~yx�С�9*چHvDb0d}*���!��2����3`z{$�*2O�$M]��z���U}[��TxQ�5�!���|/�$�[[�x��F�E?�;�t�����m6��)�����Ms�2YҔ�.�d�C|jf]ܲFL�;�1��^O��x��)�Ӝh����S��x�%���!5�5�bϙ���z��FvN{|�i|vv�?f̛�      J   \   x����@C�3.&�0K/鿎�9��,� ��������Bi�vi׿�:�*� M�2Slt��Q�c�4e&Vp�m��"��IS���~i���%&      K   �  x�mU�r�F<�_1�RQ��n�S��J.���R:h�X@�,v�����-������|Iz -�:H���ֳ��!���i�Aza*���>�ϒ��œ�����4xz��r��4&�}���ej��B�O�s�X$y��Q��B�9�f��$��8�	���Y�i:-z���R��f�u�y����ys�����Is�t�&k�����I*�<��Ӡ���,N�������w��CP��е1�`�@ 8��P�aBA+��
J���3Gp�ɔB�q�v��)�G��ѳ��E�5�C��[�%��V u.��5�h������U��Q�>�V���o�XIڣ� iA�W�-�)R�)���
��Z+*��S���Z��٬�k���8�i�t~�\��A|֘�� �����U5_B+0N�~������ckVb��<�M���8ߋ'�{�@GNe�;|�ҹ�[)O��^��V/�O����ߴlڵ؍>V������FF�뇺2��k��×
���O�<}���	/`�˜�q&c�I��1�`�u�@6�� �P�ǁ�R�����U�x���[�+vA��밷�p�ҭ����l�bBN�h�Ƌm���n"a7�j?FoU�3��,Gα�x��+��d�٧���krw�'���+�������;X�jkE?�4�2a�t������|/7��ͧa������T�L��N��ӼtPv���i2�	� �uu3:A��NN[�Vf�U2!ܚ7�CI�G�6OL~AwȖ7�Gm�0X���yf�%z�wSB��5\�5e������{P3;���Q�AvU��Q��tͥ&-��Η|��� Ύ�����)�cu��j�:o~a|l�Z>�ZS��6ya�e�}m�s���;[X��F{�������L��V��ak�񄸸�)C�^��9EX�;����j���h��      L   `  x��T���0�ɯ�{�`ɏ�� �8�E�4+��-L�
E9��&e���,K�l=
�5�������2fGﱰ�t6��[���ʣ�Kԏ���Қ�u�@�A�LU�a8�j-*��-KV��i�}Z�,CcQ��Oy�#Jd1O]��Y�i���R���T�X���}�M���0�0h%J�n�D����␦�
L4A�O������H�<Y�.��oz���@�^��=��Qʖ}VZcU���d���pEQ� )�C��v9I����n� K��c������"��ʲm��,�Ui�/�El=�y������3�M�D��� Јif4bz!h�:\��AV�59�M�;�T��(�E����|�v(��0e�c��(������<^���S��d@��u��΅$�D�kG�(h/�R;�C�����(�hpw;�l���y���w�K?���3�7Cn�)�f��y#�o3X�l7۲c����p�`n(�i�LL�3��CܹF�R�L&��O�Y��g��]_�m[�<b�d��`d�ڌ5�Pɠ6�QF��.P���2��,���Y4?������mz�n{�%-[URi��V'�k��uSu�G�9����      P   b  x�}WMo�F=ӿ����E�H�}�z3�k���R"Kt��L��|�����1� @��O��UuS�=��P���zU�,l[����������b^sl�w�-}��V��2�����������,�́��@������|��4�5�#�����F2Ԙ�B��a���9P�{o*�{�*?7wd�`[2G�q$�5d>���}O����w���^oW���jc�gfp��Cb�y����zǆ�#��:z�ו5rιypf���eXeK�2Q�8�n�@������6����y~��h+��[_���<�qf�����U��i`���s��7�A��[j�t
�,�<�}h�Ɣ�I�'��ʌ@n^��w��G8Z��!;��`;[7�F�As3��Z��bx�a��q�5��Bd�7�
�̏�[�H��d�?�O��ϝ ǹ��*}��6p_���,����B2��>�\]�ѕ.zB_Z��gf��PoM��?�TV��`	�F���h����>��_�Bu���ml!!��`�aeǒ"�Hr�cE,��@l�m���5&�F�Ħ|/�rGi=���m]͵�2-�%9�b���Z���F��R4T�2�^W�,��� }c�b-���@�ZqE�FV��}�C�A���?O�"r%c]��4)�9q�}< ��<��d��3p��O�cAt����t��e�*�=����͙�����I�5�<�q�E�/�*�e�7��GuM�3݊V"R��?=�@�����>��t��8�����+����Z�B�)�1������Q����>J���79�m�@r�^d�#87׵�_-$���e�(8�В���|n��7�% c���K��j `#�v��Ld�n�'�n�3�HD܍F]z��S&c���P'�9{vf�9������ė�����j�sY)��>�D��d����4��$��Zs���Z"���}z��N�妠 
�㘛o����T����՛\����K�)[9re8 I ���F#���MJШ�y�C��%
j�<z����TD��YL��	:at��E��kC5�(� �w����7����m��~h���l�H�p_>-��Lm}L�Y��2�ć�K�T�D�)*��,�_2˗�D~^VA�S�i�"QU ׫�jށ)�jjO}>���t�ȩO��"��B��Vze����#� |���G�V�q����;F��쫘N�p3?
N�%�?��X��ba��z~��*b7��IUcQ}��qf����y�nW��ʀ٣�^)yom��!q��Q2��B�詴 ʭ(�`]C(���Od߾E����˳�/sc�`jZ-3g��Vtj-��t�Vf��3�Icl�b/����ɻ�ܚ@J�4�^������e��4�H�WP���z�{1idW�UX8��f���CRCp���*.�=�Fj3U� �J�i��H_��*SY�:uf��0W�� 	 �/T��V"8�G��������r���Q-����٨�U����D����R�䞃,�K��P�Q��V�-���ˁxY�RZ$�Ӹ���\����s�=Ҟ�Zq�{U���l,]/�)���ִ�r$)v� �r+����ڙ�	�	Yp(��Z#�.+��A�Ñk��ɅvJ1�\d+pϒ6��4��A�n��"=O�W����R�:�������[�$@�d���E	7���X��+�s�M�H�H���{��bn�FP�������5��UF�T{�h���hJ��^��e�l�J+�V/��%R�Ie�K�v�z���7|����m�2�+NZl�py2�\m �TX\���������$��9�����:�	5*]�����"1�J������/��x      N   	  x����k� ��+�$F�Io;���2ص0^̏>j�����~&��[蓧��g�!��4�Bٙ��C	��� IA��۱-�T��Z�9IQ�{!�p>Ge�ϯ�.���P�Z~Ž���,�fʠ��$�NY�`-a�ld�긠��	����V��[E��=�4��
���A�I�I��8�!&�!�
��d��o|")���+k/	���m���c��b��٢����ұ]��I��߃��ߓ:����w*�,����,     
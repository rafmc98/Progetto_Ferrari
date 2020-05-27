PGDMP                         x           PassioneFerrari    12.2    12.2 +    G           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            H           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            I           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            J           1262    16572    PassioneFerrari    DATABASE     �   CREATE DATABASE "PassioneFerrari" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Italian_Italy.1252' LC_CTYPE = 'Italian_Italy.1252';
 !   DROP DATABASE "PassioneFerrari";
                postgres    false            �            1259    16573    eventi    TABLE     �   CREATE TABLE public.eventi (
    idevento integer NOT NULL,
    titolo text,
    img_evento text,
    descrizione_evento text,
    video text,
    pilota integer NOT NULL
);
    DROP TABLE public.eventi;
       public         heap    postgres    false            �            1259    16579    macchine    TABLE     �   CREATE TABLE public.macchine (
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
       public         heap    postgres    false            �            1259    16632    ordini    TABLE     �   CREATE TABLE public.ordini (
    "idOrdine" integer NOT NULL,
    email character varying(40),
    nomeprodotto text,
    "quantità" integer,
    data date,
    idprodotto integer,
    prezzo integer
);
    DROP TABLE public.ordini;
       public         heap    postgres    false            �            1259    16630    ordini_idOrdine_seq    SEQUENCE     �   CREATE SEQUENCE public."ordini_idOrdine_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public."ordini_idOrdine_seq";
       public          postgres    false    209            K           0    0    ordini_idOrdine_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public."ordini_idOrdine_seq" OWNED BY public.ordini."idOrdine";
          public          postgres    false    208            �            1259    16585    piloti    TABLE       CREATE TABLE public.piloti (
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
       public         heap    postgres    false            �            1259    16591    piloti_macchine    TABLE     h   CREATE TABLE public.piloti_macchine (
    idpiloti integer NOT NULL,
    idmacchine integer NOT NULL
);
 #   DROP TABLE public.piloti_macchine;
       public         heap    postgres    false            �            1259    16622    prodotti    TABLE     �   CREATE TABLE public.prodotti (
    idprodotto integer NOT NULL,
    nomeprodotto text,
    descrizione text,
    quantity integer,
    imgprodotto text,
    prezzo integer
);
    DROP TABLE public.prodotti;
       public         heap    postgres    false            �            1259    16672 
   recensioni    TABLE     �   CREATE TABLE public.recensioni (
    idrecensione integer NOT NULL,
    titolo text,
    descrizione text,
    stelle integer,
    data date,
    email character varying(50),
    idprodotto integer
);
    DROP TABLE public.recensioni;
       public         heap    postgres    false            �            1259    16670    recensioni_idRecensione_seq    SEQUENCE     �   CREATE SEQUENCE public."recensioni_idRecensione_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public."recensioni_idRecensione_seq";
       public          postgres    false    211            L           0    0    recensioni_idRecensione_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."recensioni_idRecensione_seq" OWNED BY public.recensioni.idrecensione;
          public          postgres    false    210            �            1259    16594    utenze    TABLE     �   CREATE TABLE public.utenze (
    email character varying(40) NOT NULL,
    name character varying(20),
    surname character varying(40),
    password character varying(40),
    punteggio integer,
    img text
);
    DROP TABLE public.utenze;
       public         heap    postgres    false            �
           2604    16635    ordini idOrdine    DEFAULT     v   ALTER TABLE ONLY public.ordini ALTER COLUMN "idOrdine" SET DEFAULT nextval('public."ordini_idOrdine_seq"'::regclass);
 @   ALTER TABLE public.ordini ALTER COLUMN "idOrdine" DROP DEFAULT;
       public          postgres    false    208    209    209            �
           2604    16675    recensioni idrecensione    DEFAULT     �   ALTER TABLE ONLY public.recensioni ALTER COLUMN idrecensione SET DEFAULT nextval('public."recensioni_idRecensione_seq"'::regclass);
 F   ALTER TABLE public.recensioni ALTER COLUMN idrecensione DROP DEFAULT;
       public          postgres    false    211    210    211            ;          0    16573    eventi 
   TABLE DATA           a   COPY public.eventi (idevento, titolo, img_evento, descrizione_evento, video, pilota) FROM stdin;
    public          postgres    false    202   �2       <          0    16579    macchine 
   TABLE DATA           n   COPY public.macchine (id, nome, tipo, img, anno, lunghezza, larghezza, peso, altezza, img2, img3) FROM stdin;
    public          postgres    false    203   r9       B          0    16632    ordini 
   TABLE DATA           h   COPY public.ordini ("idOrdine", email, nomeprodotto, "quantità", data, idprodotto, prezzo) FROM stdin;
    public          postgres    false    209   Z=       =          0    16585    piloti 
   TABLE DATA           �   COPY public.piloti (id, nome, cognome, "data nascita", altezza, "nazionalità", gare, vittorie, img, mondiali, descrizione) FROM stdin;
    public          postgres    false    204   w=       >          0    16591    piloti_macchine 
   TABLE DATA           ?   COPY public.piloti_macchine (idpiloti, idmacchine) FROM stdin;
    public          postgres    false    205   �F       @          0    16622    prodotti 
   TABLE DATA           h   COPY public.prodotti (idprodotto, nomeprodotto, descrizione, quantity, imgprodotto, prezzo) FROM stdin;
    public          postgres    false    207   [G       D          0    16672 
   recensioni 
   TABLE DATA           h   COPY public.recensioni (idrecensione, titolo, descrizione, stelle, data, email, idprodotto) FROM stdin;
    public          postgres    false    211   K       ?          0    16594    utenze 
   TABLE DATA           P   COPY public.utenze (email, name, surname, password, punteggio, img) FROM stdin;
    public          postgres    false    206   �K       M           0    0    ordini_idOrdine_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public."ordini_idOrdine_seq"', 90, true);
          public          postgres    false    208            N           0    0    recensioni_idRecensione_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public."recensioni_idRecensione_seq"', 34, true);
          public          postgres    false    210            �
           2606    16598    eventi Eventi_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT "Eventi_pkey" PRIMARY KEY (idevento);
 >   ALTER TABLE ONLY public.eventi DROP CONSTRAINT "Eventi_pkey";
       public            postgres    false    202            �
           2606    16600    macchine Macchine_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.macchine
    ADD CONSTRAINT "Macchine_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.macchine DROP CONSTRAINT "Macchine_pkey";
       public            postgres    false    203            �
           2606    16602 $   piloti_macchine Piloti_Macchine_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT "Piloti_Macchine_pkey" PRIMARY KEY (idpiloti, idmacchine);
 P   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT "Piloti_Macchine_pkey";
       public            postgres    false    205    205            �
           2606    16604    piloti Piloti_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.piloti
    ADD CONSTRAINT "Piloti_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.piloti DROP CONSTRAINT "Piloti_pkey";
       public            postgres    false    204            �
           2606    16640    ordini ordini_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.ordini
    ADD CONSTRAINT ordini_pkey PRIMARY KEY ("idOrdine");
 <   ALTER TABLE ONLY public.ordini DROP CONSTRAINT ordini_pkey;
       public            postgres    false    209            �
           2606    16629    prodotti prodotti_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.prodotti
    ADD CONSTRAINT prodotti_pkey PRIMARY KEY (idprodotto);
 @   ALTER TABLE ONLY public.prodotti DROP CONSTRAINT prodotti_pkey;
       public            postgres    false    207            �
           2606    16680    recensioni recensioni_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.recensioni
    ADD CONSTRAINT recensioni_pkey PRIMARY KEY (idrecensione);
 D   ALTER TABLE ONLY public.recensioni DROP CONSTRAINT recensioni_pkey;
       public            postgres    false    211            �
           2606    16606    utenze utenze_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenze
    ADD CONSTRAINT utenze_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenze DROP CONSTRAINT utenze_pkey;
       public            postgres    false    206            �
           2606    16681    recensioni email    FK CONSTRAINT     q   ALTER TABLE ONLY public.recensioni
    ADD CONSTRAINT email FOREIGN KEY (email) REFERENCES public.utenze(email);
 :   ALTER TABLE ONLY public.recensioni DROP CONSTRAINT email;
       public          postgres    false    206    211    2735            �
           2606    16641    ordini emailUtente    FK CONSTRAINT     u   ALTER TABLE ONLY public.ordini
    ADD CONSTRAINT "emailUtente" FOREIGN KEY (email) REFERENCES public.utenze(email);
 >   ALTER TABLE ONLY public.ordini DROP CONSTRAINT "emailUtente";
       public          postgres    false    2735    209    206            �
           2606    16646    ordini idProdotto    FK CONSTRAINT     �   ALTER TABLE ONLY public.ordini
    ADD CONSTRAINT "idProdotto" FOREIGN KEY (idprodotto) REFERENCES public.prodotti(idprodotto);
 =   ALTER TABLE ONLY public.ordini DROP CONSTRAINT "idProdotto";
       public          postgres    false    2737    207    209            �
           2606    16686    recensioni idProdotto    FK CONSTRAINT     �   ALTER TABLE ONLY public.recensioni
    ADD CONSTRAINT "idProdotto" FOREIGN KEY (idprodotto) REFERENCES public.prodotti(idprodotto);
 A   ALTER TABLE ONLY public.recensioni DROP CONSTRAINT "idProdotto";
       public          postgres    false    2737    207    211            �
           2606    16607    piloti_macchine idmacchine    FK CONSTRAINT        ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idmacchine FOREIGN KEY (idmacchine) REFERENCES public.macchine(id);
 D   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idmacchine;
       public          postgres    false    2729    205    203            �
           2606    16612    piloti_macchine idpiloti    FK CONSTRAINT     y   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idpiloti FOREIGN KEY (idpiloti) REFERENCES public.piloti(id);
 B   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idpiloti;
       public          postgres    false    2731    204    205            �
           2606    16617    eventi pilota    FK CONSTRAINT     l   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT pilota FOREIGN KEY (pilota) REFERENCES public.piloti(id);
 7   ALTER TABLE ONLY public.eventi DROP CONSTRAINT pilota;
       public          postgres    false    2731    204    202            ;   z  x��X�R�H<�|E�b�`�pĎ�K��`M�'_
�g�u�[�����q������F����YYY%����u�3�[g�hfte���p�К-������^�ծg7V�\�ԧ�TU�Z�y"eHU�mI�ڨ�s�T�Vִ!۱b��^7�ɋ������9t؄'�A[�<Vd-c�1�77�J��
���)OM���b�n:2���Z�7]�h���r~2��3�9Ǳ_`PY���>ީ����ի�ڬٽV�R6l+-���"����]K�Gw.�	��-����[��4Z�m�5���㔼��;��m��hU�~���^rvՇ��X���<��[}�i߰����� NC%�G϶˺�E>�q�>�{��N�-l���E����B��׸J�Hdz��q@Vr�N�D�'�˳�g+��V� ���s�<����(���wrU�t��Xs�	j	Y����^P�.�}A�L�A��jS�k��w��%H��kpS�+g�� ~B�kp!����NS�WB�đv�!V�g'Sf��?�/��ڃh�D��1��N�~�4�f� �ˁ״�G�oxm���� �/�ˣ�|�%�љ�zur�X�gP��R�!�E#��Ί"F���5�y�Y��ݕH��(x7�T27�'���Ymw�!\��+��w�wn����[�G�.e+��0��/$̉Y�yk�����w�P��{O��(��e���&!V��,5$�+� X�U��d-����2%}öM��:
s8V�z�v�|9�1J.�6�ps^8��-�%;�i�\�#�,�#)�'����m6ڲ�u)ˁu�c��<d��#��}�DW�	�(�Σ�5*�#D��1�z{�>Gf�hy|P�d��9�v��H�
��z�4!�)��@M�o@NV~�oN��
��t�(����|�L5Cc�hKy1���x"a�m�%iN
�F<���NO�`{�*b�l��%�l ��@�.�e�O@�9��6D�p:��J��>E:����L��b4Y�}�eI��#p�oc{� ���@H2':0;�q��%FPj*�_<;�:
�bzq�=�S���[�Up�������X�u�5�録u��0|jٜ���ƄX��4�Б�|{�鋿*�km���V�*nZ���~-!��FӁm\�/LA����5�iXg39�CEp6_�"�
���Ů��vqY�<��*����jt��,�\z�����}�P=��ej�N�Q8���qE10?IU��d�(�ާ��|�ҵ� �c�[��8�P\a���w�_:���(���6,����@�D��L1�G���qۄ��es��|d��N����u�gݓO�5�Y9�7j�t.5/��ah�w(�΄�I#����؝��g ���Q'~܋�FR�.#u��)q-//���p��ezz������(�Cq>_�Qd� c���0^�G�����$�6��U�4�͔kW.T�'�7ȩ7�v�H�t4�K�<�AA�7N��`���X�>$�K(	;@�$�`�b�%}������!ã�>&�LT���S ��~tu�oDi���u�.�p��p�����ׇ>�����j����pG	�Z���F!�6T&N�m)�K�:�a�o�����/U7b&�m1�����\      <   �  x��W�r1=+_���Z�p0p��"9r�@&e��m.|=�eF�i��>��T=O�wI)6����8��n7<o_��G	���o�B�jP�v����k��yR�6f*�5F�����7���0�Z��"Z��ָD���!��gL×-W�̜ņ>���VJ��3
��Zc��'��q��L�@�}��"<��,2X�cA3�RQ$�DBI�Z�"2�� �1�5BO#Li�a�4����BG]��IM鉞�'�ʅ��3	Jv,C	+)J�̕�LP&'i���h��E��3Bi��kBGY#g�6E.ۭ3�	u=���)�f�ʟ=�0	4�l����g9�>_��`g�Z��N;ù�Ş"4�FB�ҝ��Kf�l����(��=t�Z�+�EC�/�%CAl4�:�ϻ��g}Y�TX�ҭB���\r�Ǟ7�;�t+wJ��Ǟ?!�I��9F��S3w� {��v����L�������8������+�`�d�	��>5l�kخ��;_�+�ɮӰ�$��ϤaQ4wQC�k�h�q�)ae:�N���N_�Բ]G�.�!�����y ������D�´U ~������ ^3t�e�6�%�$C�q��1P��(�d��HX!�Vcy��:�!\�S�S�Λ!�����l���n�2F�_t� �Ć+ڭ�"Tb�����4|��|=ţC<���Dվ�_�Q�Y%���0_]`qR�aR�^��a�m�n�ǜ���3R8�ꬦc�+)\��Œ��bZ|����˞��w�a3�Mns2`��%��5�h>��JsV�M���������J�[�h�vy�Dh�(�xV��i����,�<yM�`K^!-A{KB�e.�����)�����5��5�Ku����0���˧�[���~ �2%�m������w��ˉ1\$�M��)�� ���l�3�~"VD���?��������tҾbK��W,J�0W�}=�w������?��q      B      x������ � �      =   h	  x��X�r�]�_��\EsD�ee���Wƞ�����&!	i�P�汚e> ��H��m�R���d�$��K��LOY�^\�{�=�2���.���E^
�G�z��H��2J��:�Q5�U4Ϣ,*���dU��W�Y��6���X���Κ��e�,g���R�����\�J�b�M�b��j/��,9{���e�t���)]5����U�Z�7��Zb�Кk�
^Һu�>p���*��ڊ�ƒ����zx�J˃��u�Q���k��8˕6�ɺ�%e{,ƅi�]n8�U�P�7���.e��J>�����d��ZV�=U��ɣ��qD��5�^�J*V�ޕ�ժ�w�pƼ��|��Ju�]\�U��f��*yMᒸ��AX��6��iq���A���9�ǒ�F����vNo�����,���="x�;��\]L������]�Z�(���bܲ����༷Ƽ56� �{Qb6ce�-qL���y|ZQ�N�󜢂��6"o,�2B-e�'�M��iLJ��������d�?�V �� ɴ ���Y+o$��P�i�0�,v�������2\�֕_!y)�T�L!`u�V?
���H��ck�8�Z�E���oj���<G e���ٻ
�Q8׵�A�k%K;��JX)p:x�3�����-?�k�3+��z��w��k�.ⶶ��؁�*`O�b%�g�gf�3�
^P�A�1����|Ǳ�.�5���	�=�x%��&���9E(+��]��A=HK�Ɠ<QHa�;?�L�0y`6���'���"9�E��JF�\~���(���QÊ
s��5:P��E���n�������3u&/n8*԰ۇ���ÿq�Mޚ�B��+����i�jt�=F�/����t���WC��Qz<�k�+����c��ɯ����V�1�	�.�T�s�Q���+OP�5#4w�6oy��v�������� ��߃��ŉxJ{�ڈ�:��.�ɶ֖w(�b�N3iP�=�=j<VZ�s�eA��v���V c�7(	���9N��%!C��9fѺ��貱��n�#L!�>=+�1��'%��n�H���
>�1@��f#s�L���X�0B��s`ir ��>İ���"�7�J��y���e逜9ԖSF�c�}�N� �S{X��D����)��jPH�h;��,իsʊ-����@�3���a�G�R0\�X%P�q�H�����1�R�����{q�?��"�\����<+�AgK��n���u	�(R))�lM*���|[Sw�G�,�nQߚ�wח�����ÿ��l��A�g��吾Еm�ǔ�\zn~;��-�ʶ����P_�޺5G��!*ٜ}�%õ���W�Na�;�ܯ��?��s/��D�"����k-�WQ{@2ܲ�i�q������2��Ah�S�d�qmn<D���{i���E,zi��<�J�[R/	{?�vȷ��p�1|c������VN	
b���p:Z�z�hPӤ�φ:B��B$S��DLǋ�I���b:����=e��(�%|��Hj��4]O�ǒo<��`d�W8*�����,KϓPf��K;^A���:D��ۏo޾�ۡ1+�[��H,��(c�a�>2@r���c��A��R�EtÍ�q�/��r}�Aɥ��U�iTѢ�q��a��f�3�&wԫ�+�l�8�R�?��퇩Ej�_�M�}�5����
���
�G	��qr�Z���c(�呞��Ԡka�< �%5��U�WG�`����/vu�^��#��9;�-+Ү"&�âp:��8���FhD2À&W�������B̃x�[>��A�z۪	+x���� ���2�^F}����b���wޏ���e�N#�-����`��NM��펆`TR��-;�-~|qnGNjݮ����P<��F�A"J#K	D\r�ʕW�=i�+镉t�9����m��zΨ��B@ �n��%L'yy�eip���}��i�����������.�G_Ń�a��C�%�`���:=t�8�E.���~$~<��&N?��Iv%��@��Ǝ[���?�_�S�Y�~ܶzvB�9c�cA-��"��v��C v��;��p.,y��� /uÝ�سnv���@�r���3 Ըc�~H��\�}ky�F�e�`��6�mq�0����N�vS՜Zs�uν  ���~��������N1C"��Y(a�Hq���(���h�ԒӚA�����Oiױ�h��F>z�ũ��2�FI��6����U���N�cKٿ�yqd<gr��[�T�3F��Ut��!��[C�zrL���#�t(*�Nѩ�4��h�q����^���������V	#��O����� �I      >   \   x����@C�3.&�0K/鿎�9��,� ��������Bi�vi׿�:�*� M�2Slt��Q�c�4e&Vp�m��"��IS���~i���%&      @   �  x�mU�r�F<�_1�RQ��n�S��J.���R:h�X@�,v�����-������|Iz -�:H���ֳ��!���i�Aza*���>�ϒ��œ�����4xz��r��4&�}���ej��B�O�s�X$y��Q��B�9�f��$��8�	���Y�i:-z���R��f�u�y����ys�����Is�t�&k�����I*�<��Ӡ���,N�������w��CP��е1�`�@ 8��P�aBA+��
J���3Gp�ɔB�q�v��)�G��ѳ��E�5�C��[�%��V u.��5�h������U��Q�>�V���o�XIڣ� iA�W�-�)R�)���
��Z+*��S���Z��٬�k���8�i�t~�\��A|֘�� �����U5_B+0N�~������ckVb��<�M���8ߋ'�{�@GNe�;|�ҹ�[)O��^��V/�O����ߴlڵ؍>V������FF�뇺2��k��×
���O�<}���	/`�˜�q&c�I��1�`�u�@6�� �P�ǁ�R�����U�x���[�+vA��밷�p�ҭ����l�bBN�h�Ƌm���n"a7�j?FoU�3��,Gα�x��+��d�٧���krw�'���+�������;X�jkE?�4�2a�t������|/7��ͧa������T�L��N��ӼtPv���i2�	� �uu3:A��NN[�Vf�U2!ܚ7�CI�G�6OL~AwȖ7�Gm�0X���yf�%z�wSB��5\�5e������{P3;���Q�AvU��Q��tͥ&-��Η|��� Ύ�����)�cu��j�:o~a|l�Z>�ZS��6ya�e�}m�s���;[X��F{�������L��V��ak�񄸸�)C�^��9EX�;����j���h��      D   �   x���A�0DןS����qk�� n>�S�~lˆ�[�^w�r2�f:�U��=�		��eAҚS��u\c`�Z��%��RɼV���(9[/�)s��W>��pd�H����L��ժ�iO�:C�	�ɺCYUu�lґ���$���?��ǽ�yS�{�q���b�~�      ?   �   x���A
�0E��)z��M�i�s!�+@�q�h�IJ�㛺r������Ƹ�d��n�$(z���fcJ��Z*ie�b��-���F���-)v�x�)���/nM�\�U@]!�W0�m�S�j"U5Z�[��a�T�.k�(�����i8��ѯ<[^j-�p�h�_T�E����=�Q}�g�9\�]     
PGDMP     #                    x           PassioneFerrari    12.2    12.2     "           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            #           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            $           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            %           1262    16464    PassioneFerrari    DATABASE     �   CREATE DATABASE "PassioneFerrari" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Italian_Italy.1252' LC_CTYPE = 'Italian_Italy.1252';
 !   DROP DATABASE "PassioneFerrari";
                postgres    false            �            1259    16501    eventi    TABLE     �   CREATE TABLE public.eventi (
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
    altezza text
);
    DROP TABLE public.macchine;
       public         heap    postgres    false            �            1259    16471    piloti    TABLE       CREATE TABLE public.piloti (
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
       public         heap    postgres    false            �            1259    16477    piloti_macchine    TABLE     h   CREATE TABLE public.piloti_macchine (
    idpiloti integer NOT NULL,
    idmacchine integer NOT NULL
);
 #   DROP TABLE public.piloti_macchine;
       public         heap    postgres    false            �            1259    16480    utenze    TABLE     �   CREATE TABLE public.utenze (
    email character varying(40) NOT NULL,
    name character varying(20),
    surname character varying(40),
    password character varying(40)
);
    DROP TABLE public.utenze;
       public         heap    postgres    false                      0    16501    eventi 
   TABLE DATA           a   COPY public.eventi (idevento, titolo, img_evento, descrizione_evento, video, pilota) FROM stdin;
    public          postgres    false    206                    0    16465    macchine 
   TABLE DATA           b   COPY public.macchine (id, nome, tipo, img, anno, lunghezza, larghezza, peso, altezza) FROM stdin;
    public          postgres    false    202   w                 0    16471    piloti 
   TABLE DATA           �   COPY public.piloti (id, nome, cognome, "data nascita", altezza, "nazionalità", gare, vittorie, img, mondiali, descrizione) FROM stdin;
    public          postgres    false    203   �                 0    16477    piloti_macchine 
   TABLE DATA           ?   COPY public.piloti_macchine (idpiloti, idmacchine) FROM stdin;
    public          postgres    false    204                    0    16480    utenze 
   TABLE DATA           @   COPY public.utenze (email, name, surname, password) FROM stdin;
    public          postgres    false    205   t       �
           2606    16508    eventi Eventi_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT "Eventi_pkey" PRIMARY KEY (idevento);
 >   ALTER TABLE ONLY public.eventi DROP CONSTRAINT "Eventi_pkey";
       public            postgres    false    206            �
           2606    16484    macchine Macchine_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.macchine
    ADD CONSTRAINT "Macchine_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.macchine DROP CONSTRAINT "Macchine_pkey";
       public            postgres    false    202            �
           2606    16486 $   piloti_macchine Piloti_Macchine_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT "Piloti_Macchine_pkey" PRIMARY KEY (idpiloti, idmacchine);
 P   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT "Piloti_Macchine_pkey";
       public            postgres    false    204    204            �
           2606    16488    piloti Piloti_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.piloti
    ADD CONSTRAINT "Piloti_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.piloti DROP CONSTRAINT "Piloti_pkey";
       public            postgres    false    203            �
           2606    16490    utenze utenze_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenze
    ADD CONSTRAINT utenze_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenze DROP CONSTRAINT utenze_pkey;
       public            postgres    false    205            �
           2606    16491    piloti_macchine idmacchine    FK CONSTRAINT        ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idmacchine FOREIGN KEY (idmacchine) REFERENCES public.macchine(id);
 D   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idmacchine;
       public          postgres    false    2705    204    202            �
           2606    16496    piloti_macchine idpiloti    FK CONSTRAINT     y   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idpiloti FOREIGN KEY (idpiloti) REFERENCES public.piloti(id);
 B   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idpiloti;
       public          postgres    false    2707    203    204            �
           2606    16509    eventi pilota    FK CONSTRAINT     l   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT pilota FOREIGN KEY (pilota) REFERENCES public.piloti(id);
 7   ALTER TABLE ONLY public.eventi DROP CONSTRAINT pilota;
       public          postgres    false    2707    203    206               W  x�}��N�@E��Wx	j`ò U��R%Vl��M�<�I���c��Y�c��=�N�'�)#��=b"�	i6cc�`˳����<}�E���w��C�
ف � ��!'�lxW��k���
%á)x'����e�C�vd!�Z�qJ*	l�t�D�:P4>*��U@�O��sr���������d��4�p��7~��Cg���o g�ng�$�s�;�
�c(5ی�D�
�,
���˟���~0|��3�
��F3��9�˛y���^��l�d����͚U��U�	96F�5��Uj�"����o'�;��J�b���I>
�����d����         [  x��ӽN�0 ��}�{�C�c�g�!���-'��B�_8�B]��NM�|�c��� <|~�� �T@cλq�	b�&	��(��8�	�o��M0��n"풼����z�@������^ĵ@v"6��'Gt�$�$!+9���B���E-9��R�]�E�";�A�'q�{v��!ԈN�MA�'l���@������� m��d|6�6�4b��;dMxAXr%��x9ӥ�5�Y�RL=�Rԋ�kc]�č#��|�P'��%V� 8���$�B)NX9CN�����<���A��3�F�	�-�R�x���c��v(l!�H��Z�v��(HL�$���j�Z� �           x�}�M��@���S�l�0����N�8���fS��2�����(����R=�*��h��{��h�������U���B�Լ�a��%�I�`�B�_')|f��@���v��L-f���6��Z�T-!Q�f���I���x��XQŊII���.b��`I�DPn4�mi`�Y�&��]�����H@�Z�������:��d���Bf�����-"������-|ѕѡ�,^:�#X��;�<d�84ל;�����n�H�?����p���o�6l|GH}�?�a��G+=R[�)Vd�W��1������q���`{y&q�������kX�tk21���G�'�:��N����ը>p�u�uE��?���Cމ������Ea#ɲh��k�D������ э�o�������/d�M`�ǮnsA����3;�A&���>h�k~�2E�]u��y��4|��G�g�͵�|��������H�q�	����a���[��H@��o4��`�{t�����Q�x0ĩ����d2���p         \   x����@C�3.&�0K/鿎�9��,� ��������Bi�vi׿�:�*� M�2Slt��Q�c�4e&Vp�m��"��IS���~i���%&         �   x����
� ���0���w롏��f�v!*Xߟ$=�X>��0Un�wE��UT���R�Ы6���ўA&D@��Z��u�/�ϳ^�s���}N���3�;��-bs 	�)��A
�B0��Qֹ(_��� (*<     
PGDMP                         x           PassioneFerrari    12.2    12.2                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16500    PassioneFerrari    DATABASE     �   CREATE DATABASE "PassioneFerrari" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Italian_Italy.1252' LC_CTYPE = 'Italian_Italy.1252';
 !   DROP DATABASE "PassioneFerrari";
                postgres    false            �            1259    16501    Macchine    TABLE     �   CREATE TABLE public."Macchine" (
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
    DROP TABLE public."Macchine";
       public         heap    postgres    false            �            1259    16507    Piloti    TABLE     �   CREATE TABLE public."Piloti" (
    id integer NOT NULL,
    nome text,
    cognome text,
    "data nascita" date,
    altezza double precision,
    "nazionalità" text,
    gare integer,
    vittorie integer,
    img text,
    mondiali integer
);
    DROP TABLE public."Piloti";
       public         heap    postgres    false            �            1259    16513    Piloti_Macchine    TABLE     j   CREATE TABLE public."Piloti_Macchine" (
    idpiloti integer NOT NULL,
    idmacchine integer NOT NULL
);
 %   DROP TABLE public."Piloti_Macchine";
       public         heap    postgres    false            �            1259    16516    utenze    TABLE     �   CREATE TABLE public.utenze (
    email character varying(40) NOT NULL,
    name character varying(20),
    surname character varying(40),
    password character varying(40)
);
    DROP TABLE public.utenze;
       public         heap    postgres    false                      0    16501    Macchine 
   TABLE DATA           d   COPY public."Macchine" (id, nome, tipo, img, anno, lunghezza, larghezza, peso, altezza) FROM stdin;
    public          postgres    false    202   f                 0    16507    Piloti 
   TABLE DATA           }   COPY public."Piloti" (id, nome, cognome, "data nascita", altezza, "nazionalità", gare, vittorie, img, mondiali) FROM stdin;
    public          postgres    false    203   �                 0    16513    Piloti_Macchine 
   TABLE DATA           A   COPY public."Piloti_Macchine" (idpiloti, idmacchine) FROM stdin;
    public          postgres    false    204   �                 0    16516    utenze 
   TABLE DATA           @   COPY public.utenze (email, name, surname, password) FROM stdin;
    public          postgres    false    205   C       �
           2606    16520    Macchine Macchine_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public."Macchine"
    ADD CONSTRAINT "Macchine_pkey" PRIMARY KEY (id);
 D   ALTER TABLE ONLY public."Macchine" DROP CONSTRAINT "Macchine_pkey";
       public            postgres    false    202            �
           2606    16522 $   Piloti_Macchine Piloti_Macchine_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY public."Piloti_Macchine"
    ADD CONSTRAINT "Piloti_Macchine_pkey" PRIMARY KEY (idpiloti, idmacchine);
 R   ALTER TABLE ONLY public."Piloti_Macchine" DROP CONSTRAINT "Piloti_Macchine_pkey";
       public            postgres    false    204    204            �
           2606    16524    Piloti Piloti_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public."Piloti"
    ADD CONSTRAINT "Piloti_pkey" PRIMARY KEY (id);
 @   ALTER TABLE ONLY public."Piloti" DROP CONSTRAINT "Piloti_pkey";
       public            postgres    false    203            �
           2606    16526    utenze utenze_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenze
    ADD CONSTRAINT utenze_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenze DROP CONSTRAINT utenze_pkey;
       public            postgres    false    205            �
           2606    16527    Piloti_Macchine idmacchine    FK CONSTRAINT     �   ALTER TABLE ONLY public."Piloti_Macchine"
    ADD CONSTRAINT idmacchine FOREIGN KEY (idmacchine) REFERENCES public."Macchine"(id);
 F   ALTER TABLE ONLY public."Piloti_Macchine" DROP CONSTRAINT idmacchine;
       public          postgres    false    204    2700    202            �
           2606    16532    Piloti_Macchine idpiloti    FK CONSTRAINT     }   ALTER TABLE ONLY public."Piloti_Macchine"
    ADD CONSTRAINT idpiloti FOREIGN KEY (idpiloti) REFERENCES public."Piloti"(id);
 D   ALTER TABLE ONLY public."Piloti_Macchine" DROP CONSTRAINT idpiloti;
       public          postgres    false    204    2702    203               [  x��ӽN�0 ��}�{�C�c�g�!���-'��B�_8�B]��NM�|�c��� <|~�� �T@cλq�	b�&	��(��8�	�o��M0��n"풼����z�@������^ĵ@v"6��'Gt�$�$!+9���B���E-9��R�]�E�";�A�'q�{v��!ԈN�MA�'l���@������� m��d|6�6�4b��;dMxAXr%��x9ӥ�5�Y�RL=�Rԋ�kc]�č#��|�P'��%V� 8���$�B)NX9CN�����<���A��3�F�	�-�R�x���c��v(l!�H��Z�v��(HL�$���j�Z� �         �   x�E�AN�0���)�@J�v�z	He���!���S9���P	i������9ʆW���	�k�m��ǰ&�VX��,<����g����h��(��]'���*���]Ӗ15�ǳ�S`hK��`��KX�8��k�T��ݮ���"�cQ�:h*���Ar*�qM�Z��vi_a�𜪱0��J��p�m|��]}���[��4�������p�8��.�\\nG���L���Щ��R��V�         \   x����@C�3.&�0K/鿎�9��,� ��������Bi�vi׿�:�*� M�2Slt��Q�c�4e&Vp�m��"��IS���~i���%&         \   x�KL���sH�M���K����M,J��,JLK��42426J3�4O4�DscK�D�T�Dôdc��̼���d��"RKJ�0"F��� ��'f     
PGDMP     7    %                x           PassioneFerrari    12.2    12.2     "           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            #           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            $           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            %           1262    16537    PassioneFerrari    DATABASE     �   CREATE DATABASE "PassioneFerrari" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Italian_Italy.1252' LC_CTYPE = 'Italian_Italy.1252';
 !   DROP DATABASE "PassioneFerrari";
                postgres    false            �            1259    16538    eventi    TABLE     �   CREATE TABLE public.eventi (
    idevento integer NOT NULL,
    titolo text,
    img_evento text,
    descrizione_evento text,
    video text,
    pilota integer NOT NULL
);
    DROP TABLE public.eventi;
       public         heap    postgres    false            �            1259    16544    macchine    TABLE     �   CREATE TABLE public.macchine (
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
       public         heap    postgres    false            �            1259    16550    piloti    TABLE       CREATE TABLE public.piloti (
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
       public         heap    postgres    false            �            1259    16556    piloti_macchine    TABLE     h   CREATE TABLE public.piloti_macchine (
    idpiloti integer NOT NULL,
    idmacchine integer NOT NULL
);
 #   DROP TABLE public.piloti_macchine;
       public         heap    postgres    false            �            1259    16559    utenze    TABLE     �   CREATE TABLE public.utenze (
    email character varying(40) NOT NULL,
    name character varying(20),
    surname character varying(40),
    password character varying(40)
);
    DROP TABLE public.utenze;
       public         heap    postgres    false                      0    16538    eventi 
   TABLE DATA           a   COPY public.eventi (idevento, titolo, img_evento, descrizione_evento, video, pilota) FROM stdin;
    public          postgres    false    202   :                 0    16544    macchine 
   TABLE DATA           n   COPY public.macchine (id, nome, tipo, img, anno, lunghezza, larghezza, peso, altezza, img2, img3) FROM stdin;
    public          postgres    false    203   �                 0    16550    piloti 
   TABLE DATA           �   COPY public.piloti (id, nome, cognome, "data nascita", altezza, "nazionalità", gare, vittorie, img, mondiali, descrizione) FROM stdin;
    public          postgres    false    204   �#                 0    16556    piloti_macchine 
   TABLE DATA           ?   COPY public.piloti_macchine (idpiloti, idmacchine) FROM stdin;
    public          postgres    false    205   $-                 0    16559    utenze 
   TABLE DATA           @   COPY public.utenze (email, name, surname, password) FROM stdin;
    public          postgres    false    206   �-       �
           2606    16563    eventi Eventi_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT "Eventi_pkey" PRIMARY KEY (idevento);
 >   ALTER TABLE ONLY public.eventi DROP CONSTRAINT "Eventi_pkey";
       public            postgres    false    202            �
           2606    16565    macchine Macchine_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.macchine
    ADD CONSTRAINT "Macchine_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.macchine DROP CONSTRAINT "Macchine_pkey";
       public            postgres    false    203            �
           2606    16567 $   piloti_macchine Piloti_Macchine_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT "Piloti_Macchine_pkey" PRIMARY KEY (idpiloti, idmacchine);
 P   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT "Piloti_Macchine_pkey";
       public            postgres    false    205    205            �
           2606    16569    piloti Piloti_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.piloti
    ADD CONSTRAINT "Piloti_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.piloti DROP CONSTRAINT "Piloti_pkey";
       public            postgres    false    204            �
           2606    16571    utenze utenze_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.utenze
    ADD CONSTRAINT utenze_pkey PRIMARY KEY (email);
 <   ALTER TABLE ONLY public.utenze DROP CONSTRAINT utenze_pkey;
       public            postgres    false    206            �
           2606    16572    piloti_macchine idmacchine    FK CONSTRAINT        ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idmacchine FOREIGN KEY (idmacchine) REFERENCES public.macchine(id);
 D   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idmacchine;
       public          postgres    false    203    2707    205            �
           2606    16577    piloti_macchine idpiloti    FK CONSTRAINT     y   ALTER TABLE ONLY public.piloti_macchine
    ADD CONSTRAINT idpiloti FOREIGN KEY (idpiloti) REFERENCES public.piloti(id);
 B   ALTER TABLE ONLY public.piloti_macchine DROP CONSTRAINT idpiloti;
       public          postgres    false    205    2709    204            �
           2606    16582    eventi pilota    FK CONSTRAINT     l   ALTER TABLE ONLY public.eventi
    ADD CONSTRAINT pilota FOREIGN KEY (pilota) REFERENCES public.piloti(id);
 7   ALTER TABLE ONLY public.eventi DROP CONSTRAINT pilota;
       public          postgres    false    202    2709    204               z  x��X�R�H<�|E�b�`�pĎ�K��`M�'_
�g�u�[�����q������F����YYY%����u�3�[g�hfte���p�К-������^�ծg7V�\�ԧ�TU�Z�y"eHU�mI�ڨ�s�T�Vִ!۱b��^7�ɋ������9t؄'�A[�<Vd-c�1�77�J��
���)OM���b�n:2���Z�7]�h���r~2��3�9Ǳ_`PY���>ީ����ի�ڬٽV�R6l+-���"����]K�Gw.�	��-����[��4Z�m�5���㔼��;��m��hU�~���^rvՇ��X���<��[}�i߰����� NC%�G϶˺�E>�q�>�{��N�-l���E����B��׸J�Hdz��q@Vr�N�D�'�˳�g+��V� ���s�<����(���wrU�t��Xs�	j	Y����^P�.�}A�L�A��jS�k��w��%H��kpS�+g�� ~B�kp!����NS�WB�đv�!V�g'Sf��?�/��ڃh�D��1��N�~�4�f� �ˁ״�G�oxm���� �/�ˣ�|�%�љ�zur�X�gP��R�!�E#��Ί"F���5�y�Y��ݕH��(x7�T27�'���Ymw�!\��+��w�wn����[�G�.e+��0��/$̉Y�yk�����w�P��{O��(��e���&!V��,5$�+� X�U��d-����2%}öM��:
s8V�z�v�|9�1J.�6�ps^8��-�%;�i�\�#�,�#)�'����m6ڲ�u)ˁu�c��<d��#��}�DW�	�(�Σ�5*�#D��1�z{�>Gf�hy|P�d��9�v��H�
��z�4!�)��@M�o@NV~�oN��
��t�(����|�L5Cc�hKy1���x"a�m�%iN
�F<���NO�`{�*b�l��%�l ��@�.�e�O@�9��6D�p:��J��>E:����L��b4Y�}�eI��#p�oc{� ���@H2':0;�q��%FPj*�_<;�:
�bzq�=�S���[�Up�������X�u�5�録u��0|jٜ���ƄX��4�Б�|{�鋿*�km���V�*nZ���~-!��FӁm\�/LA����5�iXg39�CEp6_�"�
���Ů��vqY�<��*����jt��,�\z�����}�P=��ej�N�Q8���qE10?IU��d�(�ާ��|�ҵ� �c�[��8�P\a���w�_:���(���6,����@�D��L1�G���qۄ��es��|d��N����u�gݓO�5�Y9�7j�t.5/��ah�w(�΄�I#����؝��g ���Q'~܋�FR�.#u��)q-//���p��ezz������(�Cq>_�Qd� c���0^�G�����$�6��U�4�͔kW.T�'�7ȩ7�v�H�t4�K�<�AA�7N��`���X�>$�K(	;@�$�`�b�%}������!ã�>&�LT���S ��~tu�oDi���u�.�p��p�����ׇ>�����j����pG	�Z���F!�6T&N�m)�K�:�a�o�����/U7b&�m1�����\         �  x��W�r1=+_���Z�p0p��"9r�@&e��m.|=�eF�i��>��T=O�wI)6����8��n7<o_��G	���o�B�jP�v����k��yR�6f*�5F�����7���0�Z��"Z��ָD���!��gL×-W�̜ņ>���VJ��3
��Zc��'��q��L�@�}��"<��,2X�cA3�RQ$�DBI�Z�"2�� �1�5BO#Li�a�4����BG]��IM鉞�'�ʅ��3	Jv,C	+)J�̕�LP&'i���h��E��3Bi��kBGY#g�6E.ۭ3�	u=���)�f�ʟ=�0	4�l����g9�>_��`g�Z��N;ù�Ş"4�FB�ҝ��Kf�l����(��=t�Z�+�EC�/�%CAl4�:�ϻ��g}Y�TX�ҭB���\r�Ǟ7�;�t+wJ��Ǟ?!�I��9F��S3w� {��v����L�������8������+�`�d�	��>5l�kخ��;_�+�ɮӰ�$��ϤaQ4wQC�k�h�q�)ae:�N���N_�Բ]G�.�!�����y ������D�´U ~������ ^3t�e�6�%�$C�q��1P��(�d��HX!�Vcy��:�!\�S�S�Λ!�����l���n�2F�_t� �Ć+ڭ�"Tb�����4|��|=ţC<���Dվ�_�Q�Y%���0_]`qR�aR�^��a�m�n�ǜ���3R8�ꬦc�+)\��Œ��bZ|����˞��w�a3�Mns2`��%��5�h>��JsV�M���������J�[�h�vy�Dh�(�xV��i����,�<yM�`K^!-A{KB�e.�����)�����5��5�Ku����0���˧�[���~ �2%�m������w��ˉ1\$�M��)�� ���l�3�~"VD���?��������tҾbK��W,J�0W�}=�w������?��q         h	  x��X�r�]�_��\EsD�ee���Wƞ�����&!	i�P�汚e> ��H��m�R���d�$��K��LOY�^\�{�=�2���.���E^
�G�z��H��2J��:�Q5�U4Ϣ,*���dU��W�Y��6���X���Κ��e�,g���R�����\�J�b�M�b��j/��,9{���e�t���)]5����U�Z�7��Zb�Кk�
^Һu�>p���*��ڊ�ƒ����zx�J˃��u�Q���k��8˕6�ɺ�%e{,ƅi�]n8�U�P�7���.e��J>�����d��ZV�=U��ɣ��qD��5�^�J*V�ޕ�ժ�w�pƼ��|��Ju�]\�U��f��*yMᒸ��AX��6��iq���A���9�ǒ�F����vNo�����,���="x�;��\]L������]�Z�(���bܲ����༷Ƽ56� �{Qb6ce�-qL���y|ZQ�N�󜢂��6"o,�2B-e�'�M��iLJ��������d�?�V �� ɴ ���Y+o$��P�i�0�,v�������2\�֕_!y)�T�L!`u�V?
���H��ck�8�Z�E���oj���<G e���ٻ
�Q8׵�A�k%K;��JX)p:x�3�����-?�k�3+��z��w��k�.ⶶ��؁�*`O�b%�g�gf�3�
^P�A�1����|Ǳ�.�5���	�=�x%��&���9E(+��]��A=HK�Ɠ<QHa�;?�L�0y`6���'���"9�E��JF�\~���(���QÊ
s��5:P��E���n�������3u&/n8*԰ۇ���ÿq�Mޚ�B��+����i�jt�=F�/����t���WC��Qz<�k�+����c��ɯ����V�1�	�.�T�s�Q���+OP�5#4w�6oy��v�������� ��߃��ŉxJ{�ڈ�:��.�ɶ֖w(�b�N3iP�=�=j<VZ�s�eA��v���V c�7(	���9N��%!C��9fѺ��貱��n�#L!�>=+�1��'%��n�H���
>�1@��f#s�L���X�0B��s`ir ��>İ���"�7�J��y���e逜9ԖSF�c�}�N� �S{X��D����)��jPH�h;��,իsʊ-����@�3���a�G�R0\�X%P�q�H�����1�R�����{q�?��"�\����<+�AgK��n���u	�(R))�lM*���|[Sw�G�,�nQߚ�wח�����ÿ��l��A�g��吾Еm�ǔ�\zn~;��-�ʶ����P_�޺5G��!*ٜ}�%õ���W�Na�;�ܯ��?��s/��D�"����k-�WQ{@2ܲ�i�q������2��Ah�S�d�qmn<D���{i���E,zi��<�J�[R/	{?�vȷ��p�1|c������VN	
b���p:Z�z�hPӤ�φ:B��B$S��DLǋ�I���b:����=e��(�%|��Hj��4]O�ǒo<��`d�W8*�����,KϓPf��K;^A���:D��ۏo޾�ۡ1+�[��H,��(c�a�>2@r���c��A��R�EtÍ�q�/��r}�Aɥ��U�iTѢ�q��a��f�3�&wԫ�+�l�8�R�?��퇩Ej�_�M�}�5����
���
�G	��qr�Z���c(�呞��Ԡka�< �%5��U�WG�`����/vu�^��#��9;�-+Ү"&�âp:��8���FhD2À&W�������B̃x�[>��A�z۪	+x���� ���2�^F}����b���wޏ���e�N#�-����`��NM��펆`TR��-;�-~|qnGNjݮ����P<��F�A"J#K	D\r�ʕW�=i�+镉t�9����m��zΨ��B@ �n��%L'yy�eip���}��i�����������.�G_Ń�a��C�%�`���:=t�8�E.���~$~<��&N?��Iv%��@��Ǝ[���?�_�S�Y�~ܶzvB�9c�cA-��"��v��C v��;��p.,y��� /uÝ�سnv���@�r���3 Ըc�~H��\�}ky�F�e�`��6�mq�0����N�vS՜Zs�uν  ���~��������N1C"��Y(a�Hq���(���h�ԒӚA�����Oiױ�h��F>z�ũ��2�FI��6����U���N�cKٿ�yqd<gr��[�T�3F��Ut��!��[C�zrL���#�t(*�Nѩ�4��h�q����^���������V	#��O����� �I         \   x����@C�3.&�0K/鿎�9��,� ��������Bi�vi׿�:�*� M�2Slt��Q�c�4e&Vp�m��"��IS���~i���%&         �   x����
� ���0���w롏��f�v!*Xߟ$=�X>��0Un�wE��UT���R�Ы6���ўA&D@��Z��u�/�ϳ^�s���}N���3�;��-bs 	�)��A
�B0��Qֹ(_��� (*<     
/*
 Navicat Premium Data Transfer

 Source Server         : DB Pelindo Dokumen Postgres
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : pelindodokumen
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 19/01/2024 08:13:37
*/


-- ----------------------------
-- Sequence structure for penerimaan_dokumen_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."penerimaan_dokumen_id_seq";
CREATE SEQUENCE "public"."penerimaan_dokumen_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for penerimaan_dokumen
-- ----------------------------
DROP TABLE IF EXISTS "public"."penerimaan_dokumen";
CREATE TABLE "public"."penerimaan_dokumen" (
  "id" int4 NOT NULL DEFAULT nextval('penerimaan_dokumen_id_seq'::regclass),
  "nama_pengirim" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "nomor_dokumen" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "perihal" varchar(400) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_diterima" date NOT NULL,
  "nama_penerima" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "subdit" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "ttd_penerima" text COLLATE "pg_catalog"."default",
  "diapprove_pada" timestamp(6),
  "dibuat_pada" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "diubah_pada" timestamp(6)
)
;

-- ----------------------------
-- Records of penerimaan_dokumen
-- ----------------------------
INSERT INTO "public"."penerimaan_dokumen" VALUES (1, 'Aswien', 'BAST', 'TPS-Alat', '2024-01-18', 'Fadhiyah Adlina', 'Keuangan', NULL, NULL, '2024-01-18 16:02:46.50793', NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."penerimaan_dokumen_id_seq"
OWNED BY "public"."penerimaan_dokumen"."id";
SELECT setval('"public"."penerimaan_dokumen_id_seq"', 4, true);

-- ----------------------------
-- Primary Key structure for table penerimaan_dokumen
-- ----------------------------
ALTER TABLE "public"."penerimaan_dokumen" ADD CONSTRAINT "penerimaan_dokumen_pkey" PRIMARY KEY ("id");

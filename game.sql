-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 04:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tymiro', 'furyrahe@mailinator.com', 'admin', '$2y$10$60UeulpL4WY3bMPmTHYAL.sM2ejK9zJbG.vx5RToIlDpGT8jupKgu', NULL, NULL, NULL, '2021-01-26 12:57:06', '2021-01-26 12:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `heading`, `short_details`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HelloHeading', 'HelloHeadingHelloHeadingHelloHeading', '60292a5eefb191613310558.jpg', 'HelloHeading.comdd', 1, '2021-02-08 22:35:07', '2021-02-14 19:52:08'),
(2, 'New  Game Top Up', 'New  Game Top UpNew  Game Top UpNew  Game Top UpNew  Game Top UpNew  Game Top Up', '60292b6248b241613310818.jpg', '/', 1, '2021-02-14 19:53:38', '2021-02-14 19:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Top Up Games', 1, '2021-02-11 08:14:35', '2021-02-11 08:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `code_items`
--

CREATE TABLE `code_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_item_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0 COMMENT '1=>sold out',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `code_items`
--

INSERT INTO `code_items` (`id`, `card_item_id`, `code`, `sold`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'JKDFFDSNMSDFSDFSDFSD22', 0, NULL, '2021-02-13 20:45:17', '2021-02-13 20:53:00'),
(2, 1, 'SDFSDFSDFSDFSFSDFSDFS', 0, NULL, '2021-02-13 20:45:17', '2021-02-13 20:45:17'),
(3, 1, 'SDFSDFSDFSDFSDFSDFSDFS', 0, NULL, '2021-02-13 20:45:17', '2021-02-13 20:45:17'),
(4, 1, 'GTERSFREWRWETRHYUTU', 0, NULL, '2021-02-13 20:45:17', '2021-02-13 20:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_code` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `method_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `final_amo` decimal(18,8) DEFAULT 0.00000000,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `payment` int(11) DEFAULT NULL,
  `admin_feedback` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_form` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `alias`, `image`, `name`, `status`, `parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 101, 'paypal', '5f6f1bd8678601601117144.jpg', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"paypal@user.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:44'),
(2, 102, 'perfect_money', '5f6f1d2a742211601117482.jpg', 'Perfect Money', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"6451561651551\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:22'),
(3, 103, 'stripe', '5f6f1d4bc69e71601117515.jpg', 'Stripe Hosted', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:55'),
(4, 104, 'skrill', '5f6f1d41257181601117505.jpg', 'Skrill', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:35:41'),
(5, 105, 'paytm', '5f6f1d1d3ec731601117469.jpg', 'PayTM', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:09'),
(6, 106, 'payeer', '5f6f1bc61518b1601117126.jpg', 'Payeer', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.payeer\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:26'),
(7, 107, 'paystack', '5f7096563dfb71601214038.jpg', 'PayStack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.paystack\"}}\r\n', NULL, NULL, '2019-09-14 13:14:22', '2020-09-27 07:40:38'),
(8, 108, 'voguepay', '5f6f1d5951a111601117529.jpg', 'VoguePay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:52:09'),
(9, 109, 'flutterwave', '5f6f1b9e4bb961601117086.jpg', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"FLWPUBK_TEST-5d9bb05bba2c13aa6c7a1ec7d7526ba2-X\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"FLWSECK_TEST-2ac7b05b6b9fa8a423eb58241fd7bbb6-X\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"FLWSECK_TEST32e13665a95a\"}}', '{\"KES\":\"KES\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"UGX\":\"UGX\",\"TZS\":\"TZS\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:46'),
(10, 110, 'razorpay', '5f6f1d3672dd61601117494.jpg', 'RazorPay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:34'),
(11, 111, 'stripe_js', '5f7096a31ed9a1601214115.jpg', 'Stripe Storefront', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-27 07:41:55'),
(12, 112, 'instamojo', '5f6f1babbdbb31601117099.jpg', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:59'),
(13, 501, 'blockchain', '5f6f1b2b20c6f1601116971.jpg', 'Blockchain', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:42:51'),
(14, 502, 'blockio', '5f6f19432bedf1601116483.jpg', 'Block.io', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"covidvai2020\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.blockio\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-04 10:40:46'),
(15, 503, 'coinpayments', '5f6f1b6c02ecd1601117036.jpg', 'CoinPayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:56'),
(16, 504, 'coinpayments_fiat', '5f6f1b94e9b2b1601117076.jpg', 'CoinPayments Fiat', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:17:29'),
(17, 505, 'coingate', '5f6f1b5fe18ee1601117023.jpg', 'Coingate', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:44'),
(18, 506, 'coinbase_commerce', '5f6f1b4c774af1601117004.jpg', 'Coinbase Commerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.coinbase_commerce\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:24'),
(24, 113, 'paypal_sdk', '5f6f1bec255c61601117164.jpg', 'Paypal Express', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-31 23:50:27'),
(25, 114, 'stripe_v3', '5f709684736321601214084.jpg', 'Stripe Checkout', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_mWS4YFtvSMH0WCjFFbm6JDQP00gEvE3p0G\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"w5555\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.stripe_v3\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-27 07:41:24'),
(26, 1000, 'payoneer', '5f7096605cba01601214048.jpg', 'Payoneer', 1, '[]', '[]', 0, '{\"delay\":null}', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px; text-align: left;\">Please Send To below&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px; text-align: left;\">Payoneer&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif; font-size: 16px; text-align: left;\">Account:</span></p><div><br></div><div>Payoneer Account : adminaccount@payoneer.com</div>', '{\"send_from_email\":{\"field_name\":\"send_from_email\",\"field_level\":\"Send From Email\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-07-05 03:46:04', '2020-09-27 07:40:48'),
(27, 115, 'mollie', '5f6f1bb765ab11601117111.jpg', 'Mollie', 1, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"ronniearea@gmail.com\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:11'),
(28, 1001, 'bank_wire', '5f6f1eb1548d41601117873.jpg', 'Bank Wire', 1, '[]', '[]', 0, '{\"delay\":null}', 'Please Send To below bank Details<div><br></div><div>Bank Name: Demo Test Bank</div><div>Account Name : Demo Account Name</div><div>Account Number: 000-000-000-000-000</div><div>Routing Number: 0123456789</div>', '{\"transaction_number_uy7uyui\":{\"field_name\":\"transaction_number_uy7uyui\",\"field_level\":\"Transaction Number uy7uyui\",\"type\":\"text\",\"validation\":\"required\"},\"sss\":{\"field_name\":\"sss\",\"field_level\":\"sss\",\"type\":\"text\",\"validation\":\"required\"},\"ffff\":{\"field_name\":\"ffff\",\"field_level\":\"ffff\",\"type\":\"text\",\"validation\":\"required\"}}', '2020-08-20 03:47:33', '2020-10-31 07:02:09'),
(29, 1002, 'mobile_money', '5f6f1ec54303f1601117893.jpg', 'Mobile Money', 1, '[]', '[]', 0, '{\"delay\":null}', '<span style=\"color: rgb(33, 37, 41);\">Please Send To below Mobile Money Number:</span><div><br></div><div><span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">Mobile Money Number</span>: 000-000-000-000-000</div>', '{\"send_from_number\":{\"field_name\":\"send_from_number\",\"field_level\":\"Send From Number\",\"type\":\"text\",\"validation\":\"required\"},\"transaction_number\":{\"field_name\":\"transaction_number\",\"field_level\":\"Transaction Number\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-09-24 06:50:30', '2020-09-26 04:58:13'),
(30, 116, 'cashmaal', '5f9a8b62bb4dd1603963746.png', 'Cashmaal', 1, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"3748\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"546254628759524554647987\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.cashmaal\"}}', NULL, NULL, NULL, '2020-10-29 03:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `gateway_alias`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `image`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(22, 'Bank Wire', 'USD', '', 1001, 'bank_wire', '10.00000000', '100000.00000000', '1.00', '5.00000000', '1.00000000', '5f6f1eb1548d41601117873.jpg', '{\"transaction_number_uy7uyui\":{\"field_name\":\"transaction_number_uy7uyui\",\"field_level\":\"Transaction Number uy7uyui\",\"type\":\"text\",\"validation\":\"required\"},\"sss\":{\"field_name\":\"sss\",\"field_level\":\"sss\",\"type\":\"text\",\"validation\":\"required\"},\"ffff\":{\"field_name\":\"ffff\",\"field_level\":\"ffff\",\"type\":\"text\",\"validation\":\"required\"}}', '2020-08-20 03:47:33', '2020-10-31 07:02:09'),
(23, 'Payoneer', 'USD', '', 1000, 'payoneer', '1.00000000', '1000.00000000', '0.00', '10.00000000', '1.00000000', '5f7096605cba01601214048.jpg', '{\"send_from_email\":{\"field_name\":\"send_from_email\",\"field_level\":\"Send From Email\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-07-05 03:46:04', '2020-09-27 07:40:48'),
(24, 'Mobile Money', 'USD', '', 1002, 'mobile_money', '10.00000000', '10000.00000000', '0.85', '2.56000000', '1.00000000', '5f6f1ec54303f1601117893.jpg', '{\"send_from_number\":{\"field_name\":\"send_from_number\",\"field_level\":\"Send From Number\",\"type\":\"text\",\"validation\":\"required\"},\"transaction_number\":{\"field_name\":\"transaction_number\",\"field_level\":\"Transaction Number\",\"type\":\"text\",\"validation\":\"required\"},\"screenshot\":{\"field_name\":\"screenshot\",\"field_level\":\"Screenshot\",\"type\":\"file\",\"validation\":\"required\"}}', '2020-09-24 06:50:30', '2020-09-26 04:58:13'),
(26, 'Blockchain - BTC', 'BTC', 'BTC', 501, 'blockchain', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"api_key\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\",\"xpub_code\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}', '2020-09-26 04:42:51', '2020-09-26 04:42:51'),
(27, 'Coinbase Commerce - USD', 'USD', '$', 506, 'coinbase_commerce', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"api_key\":\"c47cd7df-d8e8-424b-a20a\",\"secret\":\"55871878-2c32-4f64-ab66\"}', '2020-09-26 04:43:24', '2020-09-26 04:43:24'),
(28, 'Coingate - USD', 'USD', '$', 505, 'coingate', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"api_key\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}', '2020-09-26 04:43:44', '2020-09-26 04:43:44'),
(29, 'CoinPayments - BTC', 'BTC', '$', 503, 'coinpayments', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"public_key\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\",\"private_key\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\",\"merchant_id\":\"93a1e014c4ad60a7980b4a7239673cb4\"}', '2020-09-26 04:43:56', '2020-09-26 04:43:56'),
(30, 'CoinPayments Fiat - USD', 'USD', '$', 504, 'coinpayments_fiat', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"merchant_id\":\"93a1e014c4ad60a7980b4a7239673cb4\"}', '2020-09-26 04:44:37', '2020-09-26 04:44:37'),
(31, 'Flutterwave - USD', 'USD', 'USD', 109, 'flutterwave', '1.00000000', '2000.00000000', '0.00', '1.00000000', '1.00000000', NULL, '{\"public_key\":\"FLWPUBK_TEST-5d9bb05bba2c13aa6c7a1ec7d7526ba2-X\",\"secret_key\":\"FLWSECK_TEST-2ac7b05b6b9fa8a423eb58241fd7bbb6-X\",\"encryption_key\":\"FLWSECK_TEST32e13665a95a\"}', '2020-09-26 04:44:46', '2020-09-26 04:44:46'),
(32, 'Instamojo - INR', 'INR', '$', 112, 'instamojo', '1.00000000', '10000.00000000', '2.00', '1.00000000', '10.00000000', NULL, '{\"api_key\":\"test_2241633c3bc44a3de84a3b33969\",\"auth_token\":\"test_279f083f7bebefd35217feef22d\",\"salt\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}', '2020-09-26 04:44:59', '2020-09-26 04:44:59'),
(33, 'Mollie - EUR', 'EUR', 'EUR', 115, 'mollie', '10.00000000', '1000.00000000', '0.00', '0.00000000', '1.00000000', NULL, '{\"mollie_email\":\"ronniearea@gmail.com\",\"api_key\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}', '2020-09-26 04:45:11', '2020-09-26 04:45:11'),
(34, 'Payeer - USD', 'USD', '$', 106, 'payeer', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"merchant_id\":\"866989763\",\"secret_key\":\"7575\"}', '2020-09-26 04:45:26', '2020-09-26 04:45:26'),
(35, 'Paypal - USD', 'USD', '$', 101, 'paypal', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"paypal_email\":\"paypal@user.com\"}', '2020-09-26 04:45:44', '2020-09-26 04:45:44'),
(37, 'PayTM - AUD', 'AUD', '$', 105, 'paytm', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"MID\":\"DIY12386817555501617\",\"merchant_key\":\"bKMfNxPPf_QdZppa\",\"WEBSITE\":\"DIYtestingweb\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\",\"transaction_url\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\",\"transaction_status_url\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}', '2020-09-26 04:51:09', '2020-09-26 04:51:09'),
(38, 'Perfect Money - USD', 'USD', '$', 102, 'perfect_money', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"passphrase\":\"6451561651551\",\"wallet_id\":\"asdfadfasdfasdf\"}', '2020-09-26 04:51:22', '2020-09-26 04:51:22'),
(39, 'RazorPay - INR', 'INR', '$', 110, 'razorpay', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"key_id\":\"rzp_test_kiOtejPbRZU90E\",\"key_secret\":\"osRDebzEqbsE1kbyQJ4y0re7\"}', '2020-09-26 04:51:34', '2020-09-26 04:51:34'),
(42, 'VoguePay - USD', 'USD', '$', 108, 'voguepay', '1.00000000', '1000.00000000', '0.00', '1.00000000', '1.00000000', NULL, '{\"merchant_id\":\"demo\"}', '2020-09-26 04:52:09', '2020-09-26 04:52:09'),
(43, 'PayStack - USD', 'USD', '$', 107, 'paystack', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"public_key\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\",\"secret_key\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}', '2020-09-27 07:40:38', '2020-09-27 07:40:38'),
(45, 'Stripe Checkout - USD', 'USD', 'USD', 114, 'stripe_v3', '10.00000000', '1000.00000000', '0.00', '1.00000000', '1.00000000', NULL, '{\"secret_key\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\",\"publishable_key\":\"pk_test_mWS4YFtvSMH0WCjFFbm6JDQP00gEvE3p0G\",\"end_point\":\"w5555\"}', '2020-09-27 07:41:38', '2020-09-27 07:41:38'),
(46, 'Stripe Storefront - USD', 'USD', '$', 111, 'stripe_js', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"secret_key\":\"sk_test_vY0GhNLF8IUOzu9tLvyrAGP800s1MVfv84\",\"publishable_key\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}', '2020-09-27 07:41:55', '2020-09-27 07:41:55'),
(47, 'Stripe Hosted - USD', 'USD', '$', 103, 'stripe', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"secret_key\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\",\"publishable_key\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}', '2020-09-27 07:42:21', '2020-09-27 07:42:21'),
(49, 'Skrill - AED', 'AED', '$', 104, 'skrill', '1.00000000', '10000.00000000', '1.00', '1.00000000', '10.00000000', NULL, '{\"pay_to_email\":\"merchant@skrill.com\",\"secret_key\":\"---\"}', '2020-10-22 03:35:41', '2020-10-22 03:35:41'),
(50, 'Block.io - BTC', 'BTC', 'BTC', 502, 'blockio', '1.00000000', '100.00000000', '1.00', '1.00000000', '10.00000000', NULL, '{\"api_pin\":\"covidvai2020\",\"api_key\":\"demo\"}', '2020-10-29 00:04:12', '2020-10-29 00:04:12'),
(53, 'Cashmaal - PKR', 'PKR', 'pkr', 116, 'cashmaal', '1.00000000', '10000.00000000', '10.00', '1.00000000', '10.00000000', NULL, '{\"web_id\":\"3748\",\"ipn_key\":\"546254628759524554647987\"}', '2020-10-29 03:29:06', '2020-10-29 03:29:06'),
(55, 'Paypal Express - AUD', 'AUD', '$', 113, 'paypal_sdk', '1.00000000', '10000.00000000', '1.00', '1.00000000', '1.00000000', NULL, '{\"clientId\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\",\"clientSecret\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}', '2020-10-31 23:50:27', '2020-10-31 23:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `gcard_items`
--

CREATE TABLE `gcard_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,3) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gcard_items`
--

INSERT INTO `gcard_items` (`id`, `card_id`, `title`, `price`, `stock`, `qty`, `attribute`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'GOOGLE PLAY USD240 GIFT CARD (US) EPIC BUNDLE', '200.000', 892, 30, 'Gift card', '6026ac373f0991613147191.jpg', 1, '2021-02-12 22:26:31', '2021-02-12 23:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gift_cards`
--

INSERT INTO `gift_cards` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GOOGLE PLAY  GIFT CARD (US)', '60266f436793b1613131587.jpg', 1, '2021-02-12 18:06:27', '2021-02-12 20:53:06'),
(2, 'Play card', '602a997068fad1613404528.jpg', 1, '2021-02-15 21:55:28', '2021-02-15 21:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `play_store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `code`, `category_id`, `item_name`, `details`, `image`, `apple_store`, `play_store`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FreeFireVF1Oxu', 1, 'Free Fire', 'Top up Free Fire Diamonds in seconds! Just enter your Player ID, select the amount you wish to purchase, complete the payment, and the Diamonds will be added immediately to your Free Fire account.\r\n\r\nPay conveniently using bKash. There\'s no credit card, registration, or log-in required!', '602889e72675a1613269479.jpg', 'https://apps.apple.com/us/app/garena-free-fire-the-cobra/id1300146617', 'https://play.google.com/store/apps/details?id=com.dts.freefireth&hl=en&gl=US', '1', '2021-02-10 08:14:32', '2021-02-14 20:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `item_id`, `type_name`, `additional`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free Fire (In Code)', '{\"player_id\":{\"field_name\":\"player_id\",\"field_level\":\"Player ID\",\"type\":\"text\",\"validation\":\"required\"}}', 1, '2021-02-12 09:18:54', '2021-02-12 09:18:54'),
(2, 1, 'Free Fire (Promo)', '{\"player_id\":{\"field_name\":\"player_id\",\"field_level\":\"Player ID\",\"type\":\"text\",\"validation\":\"required\"}}', 1, '2021-02-12 09:20:21', '2021-02-12 11:14:31'),
(4, 1, 'Free Fire (In Game)', '{\"social_account\":{\"field_name\":\"social_account\",\"field_level\":\"social account\",\"type\":\"select\",\"validation\":\"required\"}}', 1, '2021-02-12 11:52:51', '2021-02-12 11:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_26_042302_create_admins_table', 1),
(6, '2021_02_02_170144_create_subscriptions_table', 2),
(7, '2021_02_08_145434_create_banners_table', 3),
(8, '2021_02_10_013109_create_items_table', 4),
(10, '2021_02_10_150347_create_categories_table', 5),
(11, '2021_02_12_023734_create_item_types_table', 6),
(12, '2021_02_10_143307_create_packages_table', 7),
(13, '2021_02_12_061139_create_gift_cards_table', 8),
(14, '2021_02_12_061813_create_gcard_items_table', 8),
(15, '2021_02_12_062132_create_code_items_table', 8),
(16, '2021_02_14_140442_create_orders_table', 9),
(17, '2021_02_14_150745_create_settings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `acc_type`, `item_name`, `username`, `password`, `player_id`, `qty`, `amount`, `attribute`, `created_at`, `updated_at`) VALUES
(1, 'V45DeCk9wtJ6', 'facebook', NULL, '23423', '234234', NULL, '60', '80.000', 'Airdrop', '2021-02-14 20:43:54', '2021-02-14 20:43:54'),
(2, 'oKnEN1P9mkqI', NULL, NULL, NULL, NULL, '646464654654', '200', '100.000', 'diamond', '2021-02-14 21:50:32', '2021-02-14 21:50:32'),
(3, 'e7IWRgrRneaD', 'gmail', NULL, 'snj6276@gmail.com', '313612', NULL, '60', '80.000', 'Airdrop', '2021-02-14 22:29:25', '2021-02-14 22:29:25'),
(4, 'CC1teqrdirpf', NULL, NULL, NULL, NULL, '5363266446', '200', '100.000', 'diamond', '2021-02-14 22:54:07', '2021-02-14 22:54:07'),
(5, 'OuU6CRbwBjCH', 'gmail', NULL, 'snj6276@gmail.com', '65465465', NULL, '60', '80.000', 'Airdrop', '2021-02-14 23:23:37', '2021-02-14 23:23:37'),
(6, 'LWP1dJO2gehV', NULL, NULL, NULL, NULL, '6354646546546', '200', '100.000', 'diamond', '2021-02-14 23:32:55', '2021-02-14 23:32:55'),
(7, 'bICj88iupCb2', NULL, 'GOOGLE PLAY USD240 GIFT CARD (US) EPIC BUNDLE', NULL, NULL, NULL, '2', '400.00', 'card_item', '2021-02-15 21:46:57', '2021-02-15 21:46:57'),
(8, 'Qlv6dQve4EiV', NULL, NULL, NULL, NULL, NULL, '200', '100.000', 'diamond', '2021-02-15 21:59:01', '2021-02-15 21:59:01'),
(9, 'JhOcAz4le8IO', NULL, NULL, NULL, NULL, '5363266446', '200', '100.000', 'diamond', '2021-02-15 21:59:15', '2021-02-15 21:59:15'),
(10, 'pPWAuAYnK9jy', NULL, 'GOOGLE PLAY USD240 GIFT CARD (US) EPIC BUNDLE', NULL, NULL, NULL, '2', '400.00', 'card_item', '2021-02-15 21:59:55', '2021-02-15 21:59:55'),
(11, '9p9fSttNf7Ub', NULL, NULL, NULL, NULL, '5363266446', '200', '100.000', 'diamond', '2021-02-15 22:31:27', '2021-02-15 22:31:27'),
(12, 'IyWJwBzIlDXO', NULL, 'GOOGLE PLAY USD240 GIFT CARD (US) EPIC BUNDLE', NULL, NULL, NULL, '2', '400.00', 'card_item', '2021-02-16 08:00:54', '2021-02-16 08:00:54'),
(13, 'VaxhARvKofis', NULL, 'GOOGLE PLAY USD240 GIFT CARD (US) EPIC BUNDLE', NULL, NULL, NULL, '1', '200.00', 'card_item', '2021-02-16 08:01:22', '2021-02-16 08:01:22'),
(14, 'BDigkKcpeRVk', 'facebook', NULL, '23423423423', '46546465', NULL, '60', '80.000', NULL, '2021-02-17 07:58:14', '2021-02-17 07:58:14'),
(15, 'YfvKeWMCVA1w', NULL, NULL, NULL, NULL, '564646465', '200', '100.000', NULL, '2021-02-17 08:02:35', '2021-02-17 08:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,3) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `item_type_id`, `qty`, `attribute`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 200, 'diamond', '100.000', 1, '2021-02-12 11:23:56', '2021-02-12 11:44:15'),
(2, 1, 400, 'diamond', '80.000', 1, '2021-02-12 11:23:56', '2021-02-12 11:44:15'),
(3, 4, 60, 'Airdrop', '80.000', 1, '2021-02-12 11:23:56', '2021-02-12 11:44:15'),
(4, 1, 250, 'diamond', '90.000', 1, '2021-02-12 11:23:56', '2021-02-12 11:44:15'),
(5, 2, 300, 'diamond', '80.000', 1, '2021-02-12 11:23:56', '2021-02-12 11:44:15'),
(6, 4, 200, 'diamond', '850.000', 1, '2021-02-12 11:23:56', '2021-02-12 11:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favico`, `sitename`, `created_at`, `updated_at`) VALUES
(1, '6029452f5835f1613317423.png', '6029452f5da831613317423.png', 'Game', '2021-02-14 21:43:43', '2021-02-14 21:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,3) NOT NULL,
  `discount` int(11) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'days',
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `price`, `discount`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Veritatis dolorum ne', '201.000', 44, 88, 1, '2021-02-02 23:57:18', '2021-02-03 22:30:47'),
(2, 'Ut unde alias cum ac', '938.000', 23, 123, 0, '2021-02-03 21:32:35', '2021-02-03 21:32:35'),
(3, 'Ut enim minus quaera', '755.000', 77, 67, 0, '2021-02-03 22:00:12', '2021-02-03 22:00:12'),
(4, 'Maxime sapiente enim', '88.000', 99, 67, 0, '2021-02-03 22:00:48', '2021-02-03 22:19:53'),
(5, 'esre', '33.000', 333, 33, 1, '2021-02-03 22:22:02', '2021-02-03 22:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(11,3) NOT NULL DEFAULT 0.000,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `email_verified_at`, `password`, `balance`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alan Mathis', '', 'kuga@mailinator.com', '', NULL, '$2y$10$LawiDg/nGYlDOkJWRY5Z2OTZIlU07gzsiXO2XDOnvwbVehN7bUSk2', '0.000', NULL, '2021-01-26 10:57:01', '2021-01-26 10:57:01'),
(2, 'MINHAJUL ISALM', 'username', 'snj6276@gmail.com', '234234234', NULL, '$2y$10$9Tl2jpcQDgYSu83S3J8hhe.pNGydmPN8Ie644WGN7n8Kb/eOVPQEG', '0.000', NULL, '2021-02-16 08:42:47', '2021-02-16 08:42:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_items`
--
ALTER TABLE `code_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcard_items`
--
ALTER TABLE `gcard_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `code_items`
--
ALTER TABLE `code_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `gcard_items`
--
ALTER TABLE `gcard_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

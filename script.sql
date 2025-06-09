--
-- Base de datos: `u325383686_diplomadouba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banks`
--

INSERT INTO `banks` (`id`, `created_at`, `updated_at`, `name`, `currency`) VALUES
(1, '2025-06-09 21:10:08', '2025-06-09 21:10:08', 'Chase', '$'),
(2, '2025-06-09 21:10:08', '2025-06-09 21:10:08', 'BOFA', '$'),
(3, '2025-06-09 21:10:08', '2025-06-09 21:10:08', 'Wells Fargo', '$'),
(4, '2025-06-09 21:10:08', '2025-06-09 21:10:08', 'CityBank', '$'),
(5, '2025-06-09 21:10:08', '2025-06-09 21:10:08', 'Citigroup', '$');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cashes`
--

CREATE TABLE `cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `closure_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cashes`
--

INSERT INTO `cashes` (`id`, `created_at`, `updated_at`, `name`, `currency`, `closure_date`) VALUES
(1, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Hotel Principal', '$', NULL),
(2, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Estacionamiento Principal', '$', NULL),
(3, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Casino Principal', '$', NULL),
(4, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Hotel Secundaria', '$', NULL),
(5, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Estacionamiento Secundaria', '$', NULL),
(6, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Casino Secundaria', '$', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rif` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `created_at`, `updated_at`, `name`, `rif`) VALUES
(1, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Hotel', 'J-555555555'),
(2, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Estacionamiento', 'J-666666666'),
(3, '2025-05-21 16:04:52', '2025-05-21 16:04:52', 'Casino', 'J-777777777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contables`
--

CREATE TABLE `contables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contables`
--

INSERT INTO `contables` (`id`, `created_at`, `updated_at`, `codigo`, `name`, `type`) VALUES
(1, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I001', 'Ingresos operativos', 'Ingreso'),
(2, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I002', 'Ingreso Concesionario', 'Ingreso'),
(3, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I003', 'Ingreso por Alquiler', 'Ingreso'),
(4, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I004', 'Ingreso por Vallas', 'Ingreso'),
(5, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I005', 'Ingreso Intercambio Divisa', 'Ingreso'),
(6, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I006', 'Ingreso por Participacion Casino', 'Ingreso'),
(7, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I007', 'Transferencia entre cuentas', 'Ingreso'),
(8, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'I008', 'Ingreso Panorama', 'Ingreso'),
(9, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A001', 'Agua', 'Egreso'),
(10, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A002', 'Electricidad', 'Egreso'),
(11, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A003', 'Asero Urbano', 'Egreso'),
(12, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A004', 'Internet', 'Egreso'),
(13, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A005', 'Teléfono', 'Egreso'),
(14, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A006', 'Extra por Eventos', 'Egreso'),
(15, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A007', 'Gastos de Personal', 'Egreso'),
(16, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A008', 'Parafiscales Laboral', 'Egreso'),
(17, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A009', 'Bonificaciones Especiales', 'Egreso'),
(18, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A010', 'Gastos Notarias', 'Egreso'),
(19, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A011', 'Impuestos Nacionales', 'Egreso'),
(20, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A012', 'Impuestos Municipales', 'Egreso'),
(21, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A013', 'Pago a Entes Gubernamentales', 'Egreso'),
(22, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A014', 'Servicios por Terceros', 'Egreso'),
(23, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A015', 'Honorarios Profesionales', 'Egreso'),
(24, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A016', 'Prestamo Intercompañia Casino', 'Egreso'),
(25, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A017', 'Prestamo Intercompañia Brideshead', 'Egreso'),
(26, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A018', 'Materiales y Articulos de Oficina', 'Egreso'),
(27, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A019', 'Gastos Médicos', 'Egreso'),
(28, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A020', 'Gastos de Transporte y Traslados', 'Egreso'),
(29, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A021', 'Gastos Tecnológicos', 'Egreso'),
(30, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'A022', 'Transferencia entre cuentas', 'Egreso'),
(31, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'B001', 'Viveres', 'Egreso'),
(32, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'B002', 'Alimentos y Bebidas', 'Egreso'),
(33, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'B003', 'Uniformes y Bioseguridad', 'Egreso'),
(34, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'B004', 'Reparaciones', 'Egreso'),
(35, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'B005', 'Mantenimiento General', 'Egreso'),
(36, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'B006', 'Articulos de Limpieza', 'Egreso'),
(37, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'C001', 'Proyecto Piscina', 'Egreso'),
(38, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'C002', 'Proyecto Conexión Casa Rosada', 'Egreso'),
(39, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'C004', 'Proyecto Bar Caracas', 'Egreso'),
(40, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'C005', 'Reparación de Chiller', 'Egreso'),
(41, '2022-06-10 16:00:36', '2022-06-10 16:00:36', 'C006', 'Otros Proyectos', 'Egreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entries`
--

CREATE TABLE `entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `monto` double(100,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `contable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cash_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entries`
--

INSERT INTO `entries` (`id`, `created_at`, `updated_at`, `monto`, `descripcion`, `contable_id`, `cash_id`) VALUES
(1, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 1079.15, 'Eaque ratione laboriosam excepturi beatae delectus eos. Dicta voluptatem ut incidunt qui. Ut provident et veritatis et. Ea at est ducimus reiciendis rem qui numquam.', 25, 3),
(2, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 1917.64, 'Commodi vitae consequuntur laudantium. Magni voluptatem eos vitae quam autem optio. Sequi fugit sequi sit sint. Et suscipit repellendus ea perferendis eligendi.', 28, 3),
(3, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 1706.13, 'Consequatur est ut enim illo qui. Omnis architecto et corporis mollitia corporis eius. Consequuntur ducimus et veritatis est architecto aut. Et debitis facere ex fuga.', 33, 2),
(4, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 565.73, 'Nobis qui aut qui qui consequatur. Autem vitae quos esse soluta iure exercitationem nihil.', 31, 1),
(5, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 1881.03, 'Ipsum ullam vero qui odio eveniet consequuntur ipsam. Ipsa et in enim magni sed est. Aut rerum saepe nemo voluptatem itaque ullam autem distinctio.', 16, 5),
(6, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 1923.67, 'Dolorem dolorem pariatur officia dolorem excepturi. Autem nihil repellat doloremque id. Quis laboriosam est qui minus. Quo quo soluta quo voluptatem.', 15, 5),
(7, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 810.37, 'Corrupti quae esse id veritatis aliquid impedit modi. Similique esse sint fugit aut eaque rerum possimus. Dolores ratione qui qui aut.', 25, 1),
(8, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 361.67, 'Omnis architecto omnis repellat rerum. Nulla odit quos veniam neque. Sit quam ut laboriosam.', 26, 4),
(9, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 1699.55, 'Qui doloribus eum iusto error ad eligendi. Necessitatibus maxime consectetur repellendus illo vero hic architecto accusantium. Enim minus velit ad.', 25, 4),
(10, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 419.98, 'Perspiciatis rerum earum vel quod et eius. At sunt dicta tempore cumque aut similique consequatur. Praesentium expedita voluptatem ipsum. In natus itaque corrupti recusandae sint corporis.', 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `monto` double(100,2) DEFAULT NULL,
  `forma_de_pago` varchar(255) DEFAULT NULL,
  `recibo` varchar(255) DEFAULT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cash_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trash` varchar(255) DEFAULT NULL,
  `correlativo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`id`, `created_at`, `updated_at`, `fecha`, `numero`, `monto`, `forma_de_pago`, `recibo`, `concepto`, `descripcion`, `company_id`, `cash_id`, `provider_id`, `bank_id`, `contable_id`, `trash`, `correlativo`) VALUES
(1, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '2009-08-17', '12345', 1317.31, 'Efectivo', '1749489009382', 'Id optio culpa sit est vel illum a. Vel qui sed ut. Ipsum error pariatur repellat minus et.', 'At laborum recusandae nihil voluptatem. Qui fuga et eum rerum. Corporis repellat quod veniam. Eos earum aliquid quos sunt fugiat dolores.', 1, 6, 2, 2, 37, NULL, NULL),
(2, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1993-07-30', '12345', 253.07, 'Efectivo', '1749489009456', 'Sit consequuntur est quae quibusdam. Ea consequatur dolorem eum harum. Quod possimus fugit sed dicta nihil qui sapiente.', 'Est eius iste voluptate ratione eos nam. Sequi eveniet omnis accusantium repellendus. Sed aut iure sint. Ratione qui sed recusandae et sunt.', 2, 4, 3, 1, 24, NULL, NULL),
(3, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '2012-11-21', '12345', 827.25, 'Efectivo', '1749489009214', 'Exercitationem maxime aliquid quia inventore quia sit. Et nihil inventore beatae. Ea natus mollitia sunt neque suscipit distinctio provident eius. Rerum rerum nulla et et molestias.', 'Aut quasi eos et ad fuga earum molestiae. Sit error maxime omnis et perferendis ut maiores. Perspiciatis et qui quod ab. Odit quidem quod sint similique veritatis.', 2, 1, 2, 3, 3, NULL, NULL),
(4, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1985-11-13', '12345', 1698.68, 'Efectivo', '1749489009390', 'Minima non facilis iusto illum eum. Quo voluptatem ea nemo reprehenderit amet nihil nam accusamus.', 'Voluptate est sit repellat molestias debitis. Voluptatem voluptas ea est ab non.', 2, 2, 1, 2, 4, NULL, NULL),
(5, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1987-08-28', '12345', 1734.44, 'Efectivo', '1749489009434', 'Mollitia architecto consequatur id eum laboriosam ipsa. In quia minima quibusdam. Atque veritatis labore itaque adipisci quo odio accusantium exercitationem.', 'Deleniti exercitationem omnis consequuntur illo. Vero reiciendis non quae est. Non ea ut distinctio quo dicta. Est pariatur provident aut tempore magnam est quas occaecati.', 3, 1, 2, 2, 1, NULL, NULL),
(6, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1981-08-22', '12345', 1947.57, 'Efectivo', '1749489009830', 'Asperiores nesciunt excepturi enim deleniti. Minus sunt dignissimos quaerat exercitationem. Et quia maxime nobis eius ut rerum veniam.', 'Quis delectus voluptas ipsum sint eaque. Inventore quo nihil hic provident. Ut ex fugit iste culpa temporibus.', 2, 4, 3, 3, 26, NULL, NULL),
(7, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '2001-04-28', '12345', 209.21, 'Efectivo', '1749489009360', 'Quisquam sit commodi est est magnam possimus. Eos recusandae vitae facilis. Reiciendis et nulla cumque corporis repellendus autem recusandae eius.', 'Aliquid ab omnis ipsum accusamus. Quidem sunt nemo error nesciunt sit soluta enim. Unde iste dolorem voluptatum voluptas fugit earum ex inventore.', 3, 2, 3, 1, 21, NULL, NULL),
(8, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1986-09-11', '12345', 1934.81, 'Efectivo', '1749489009746', 'Quisquam eos autem ea corrupti. Aperiam laudantium quas ipsum qui.', 'Aut voluptas et recusandae placeat. Cum nostrum et debitis nemo ut provident a. Vel ducimus voluptas porro. Voluptatem eligendi magni recusandae nobis et sint dicta.', 3, 3, 3, 1, 35, NULL, NULL),
(9, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1976-03-06', '12345', 1969.39, 'Efectivo', '1749489009838', 'Vitae perferendis expedita aut quod et animi sunt. Soluta eius et error corrupti quae. Quibusdam deserunt nobis nostrum qui fuga consequatur. Labore et quas sint et ratione.', 'Voluptas est voluptatem ut in. Amet maiores nihil consequatur tenetur deleniti. Debitis autem dicta et. Consectetur maxime error fuga vel soluta aut maxime.', 1, 5, 1, 2, 22, NULL, NULL),
(10, '2025-06-09 21:10:09', '2025-06-09 21:10:09', '1989-03-06', '12345', 454.02, 'Efectivo', '1749489009250', 'Ratione consequatur et autem et. Ad sapiente aut sunt ea minus sunt. Quis a ipsam repellat illum ducimus. Repellendus corporis consequatur libero id nihil.', 'Temporibus quia perspiciatis placeat pariatur exercitationem. Omnis qui dignissimos quis assumenda. Beatae iusto sint et aut quis repellat rem.', 3, 6, 2, 2, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historyitems`
--

CREATE TABLE `historyitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recibo` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `cuenta` varchar(255) DEFAULT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `caja` varchar(255) DEFAULT NULL,
  `monto` double(100,2) DEFAULT NULL,
  `xd` varchar(255) DEFAULT NULL,
  `concepto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(97, '2014_10_12_000000_create_users_table', 1),
(98, '2014_10_12_100000_create_password_resets_table', 1),
(99, '2019_08_19_000000_create_failed_jobs_table', 1),
(100, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(101, '2022_08_24_130250_create_cashes_table', 1),
(102, '2022_08_24_131841_create_banks_table', 1),
(103, '2022_08_24_133728_create_companies_table', 1),
(104, '2022_08_24_134256_create_contables_table', 1),
(105, '2022_08_24_134533_create_providers_table', 1),
(106, '2022_08_24_144444_create_expenses_table', 1),
(107, '2022_08_24_144446_create_entries_table', 1),
(108, '2022_08_26_145230_add_trash_column_to_expenses_table', 1),
(109, '2022_08_31_140357_add_correlativo_to_expenses_table', 1),
(110, '2022_09_01_134729_create_historyitems_table', 1),
(111, '2024_03_05_150439_add_closure_date_column_to_cashes_table', 1),
(112, '2025_05_21_192452_add_role_column_to_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `created_at`, `updated_at`, `type`, `number`, `name`, `address`) VALUES
(1, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'J', '312345678', 'INVERSIONES TECHNOSOFT, C.A.', 'Calle 3, Zona Industrial La Trinidad, Caracas, Miranda'),
(2, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'V', '12345678', 'JUAN CARLOS PÉREZ', 'Av. Libertador, Edif. Central, Apto 4B, Maracay, Aragua'),
(3, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'J', '278945612', 'REPUESTOS EL VOLANTE, C.A.', 'Calle Comercio, Local 12, Barquisimeto, Lara'),
(4, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'G', '987654321', 'ALCALDÍA DEL MUNICIPIO SUCRE', 'Av. Francisco de Miranda, Caracas, Distrito Capital'),
(5, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'J', '456789123', 'SERVICIOS Y SOLUCIONES 2020, C.A.', 'Av. Intercomunal, Zona Industrial, Valencia, Carabobo'),
(6, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'V', '20457896', 'MARÍA FERNANDA RIVERO', 'Calle Sucre, Quinta El Milagro, Mérida, Mérida'),
(7, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'J', '365214879', 'CONSTRUCCIONES DEL NORTE, C.A.', 'Av. Universidad, Torre Norte, Piso 5, Caracas, Distrito Capital'),
(8, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'J', '895623147', 'AGROPECUARIA LOS ANDES, C.A.', 'Finca El Encanto, Sector Quebrada Honda, Táchira'),
(9, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'V', '30478596', 'LUIS MIGUEL TORRES', 'Urb. Las Acacias, Calle 10, Casa N°23, Maracaibo, Zulia'),
(10, '2025-06-09 17:10:08', '2025-06-09 17:10:08', 'J', '741852963', 'COMERCIALIZADORA VENELECTRO, C.A.', 'Parque Industrial Los Guayos, Galpón 4, Los Guayos, Carabobo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('Analista','Director','Gerente') NOT NULL DEFAULT 'Analista'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Yerson Salaya', 'yerson.salaya.1@gmail.com', NULL, '$2y$10$BTppJfumy8NoAhPsRFEVF.GZ1skRbaoGH0V0A6PJxpz/F1nLzcSuC', NULL, '2025-06-09 21:10:08', '2025-06-09 21:10:08', 'Gerente'),
(2, 'Gerente', 'gerente2025@gmail.com', NULL, '$2y$10$zK.jK0wWQ4AMibx8sVLVmuysGUEMdGgSyGnQ.VJzn22pm/ZTz/aVa', NULL, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 'Gerente'),
(3, 'Director', 'director2025@gmail.com', NULL, '$2y$10$QBitw.b.eB.vXBL1W/iSh.NN6wf5YRwfEb42nf2QQ3ImMHwxaMbQq', NULL, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 'Director'),
(4, 'Analista', 'analista2025@gmail.com', NULL, '$2y$10$2evfp1ZiiiLgjeZO5QKrn.r1hg4pbepw5MDEiZp9PdbbSq/UbPG5q', NULL, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 'Analista'),
(5, 'Analista2', 'analista22025@gmail.com', NULL, '$2y$10$EwDXeSnObvnr1gM9KvExveBIPrUiV8/HsOWjZYDqvXvNSVgpK01i.', NULL, '2025-06-09 21:10:09', '2025-06-09 21:10:09', 'Analista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cashes`
--
ALTER TABLE `cashes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contables`
--
ALTER TABLE `contables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entries_contable_id_foreign` (`contable_id`),
  ADD KEY `entries_cash_id_foreign` (`cash_id`);

--
-- Indices de la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_company_id_foreign` (`company_id`),
  ADD KEY `expenses_cash_id_foreign` (`cash_id`),
  ADD KEY `expenses_provider_id_foreign` (`provider_id`),
  ADD KEY `expenses_bank_id_foreign` (`bank_id`),
  ADD KEY `expenses_contable_id_foreign` (`contable_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historyitems`
--
ALTER TABLE `historyitems`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cashes`
--
ALTER TABLE `cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contables`
--
ALTER TABLE `contables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `entries`
--
ALTER TABLE `entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historyitems`
--
ALTER TABLE `historyitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_cash_id_foreign` FOREIGN KEY (`cash_id`) REFERENCES `cashes` (`id`),
  ADD CONSTRAINT `entries_contable_id_foreign` FOREIGN KEY (`contable_id`) REFERENCES `contables` (`id`);

--
-- Filtros para la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `expenses_cash_id_foreign` FOREIGN KEY (`cash_id`) REFERENCES `cashes` (`id`),
  ADD CONSTRAINT `expenses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `expenses_contable_id_foreign` FOREIGN KEY (`contable_id`) REFERENCES `contables` (`id`),
  ADD CONSTRAINT `expenses_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

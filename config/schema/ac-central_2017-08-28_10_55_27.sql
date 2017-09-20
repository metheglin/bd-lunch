-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2017 at 10:55 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac-central`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `console_account` varchar(255) DEFAULT NULL,
  `directors` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `console_account`, `directors`, `status`, `isactive`, `isdel`, `modified_by`, `created_by`, `modified`, `created`) VALUES
(1, 'Flying Tigers', 'ac.flyingtiger.com', '', NULL, 1, NULL, NULL, NULL, '2017-07-03 05:25:57', '2017-07-03 04:37:47'),
(2, 'Apparel Cloud', '', '', NULL, 1, NULL, NULL, NULL, '2017-07-27 03:52:56', '2017-07-27 03:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `media_requests`
--

CREATE TABLE `media_requests` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `media_mode` varchar(255) DEFAULT NULL,
  `media_scope` varchar(100) NOT NULL,
  `media_scope_desc` varchar(500) DEFAULT NULL,
  `media_brands` varchar(255) DEFAULT NULL,
  `release_domains` varchar(500) DEFAULT NULL,
  `director_chatids` varchar(255) DEFAULT NULL,
  `use_apikey_server` tinyint(1) DEFAULT '0',
  `use_apikey_browser` tinyint(1) DEFAULT '0',
  `use_production` tinyint(1) DEFAULT '0',
  `prod_reverse_proxy` tinyint(1) DEFAULT '0',
  `prod_ssl` tinyint(1) DEFAULT '0',
  `use_staging` tinyint(1) DEFAULT '0',
  `use_crossmedia` tinyint(1) DEFAULT '0',
  `use_ranking` tinyint(1) DEFAULT '0',
  `hostedby_everforth` tinyint(1) DEFAULT '0',
  `status` tinyint(2) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `media_requests`
--

INSERT INTO `media_requests` (`id`, `company_id`, `name`, `display_name`, `media_mode`, `media_scope`, `media_scope_desc`, `media_brands`, `release_domains`, `director_chatids`, `use_apikey_server`, `use_apikey_browser`, `use_production`, `prod_reverse_proxy`, `prod_ssl`, `use_staging`, `use_crossmedia`, `use_ranking`, `hostedby_everforth`, `status`, `isactive`, `isdel`, `modified_by`, `created_by`, `modified`, `created`) VALUES
(1, 1, 'test tigers', 'Test sites', 'Brandsite', 'Company', 'sites', 'brands', 'www.google.com', 'chatwork1,chatwork2', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, '2017-08-25 04:56:20', '2017-07-03 09:21:45'),
(2, 1, 'Bransite order', 'Create new Bransite', 'Brandsite', 'Company', 'Company profiles with products', 'abc,def', 'www.google.com', '', 1, 1, 0, 0, 0, 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, '2017-08-04 05:41:02', '2017-07-04 06:48:00'),
(3, 2, 'Apparel Cloud Website renewal', 'AC', 'Blogweb', 'Brand', 'sites', '', 'www.tarikul.com,www.google.com', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 1, NULL, NULL, NULL, '2017-08-18 09:58:34', '2017-07-27 08:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `media_sysinfo`
--

CREATE TABLE `media_sysinfo` (
  `id` int(11) NOT NULL,
  `media_request_id` int(11) DEFAULT NULL,
  `repository` varchar(255) DEFAULT NULL,
  `appid` varchar(100) DEFAULT NULL,
  `apikey_dev` varchar(100) DEFAULT NULL,
  `apikey_prd` varchar(100) DEFAULT NULL,
  `apikey_browser_dev` varchar(100) DEFAULT NULL,
  `apikey_browser_prd` varchar(100) DEFAULT NULL,
  `console_account` varchar(255) DEFAULT NULL,
  `staging_domain` varchar(255) DEFAULT NULL,
  `ecs_cluster_name_dev` varchar(255) DEFAULT NULL,
  `ecs_cluster_ip_dev` varchar(255) DEFAULT NULL,
  `production_domain` varchar(255) DEFAULT NULL,
  `elasticbeanstalk_env_name_prod` varchar(255) DEFAULT NULL,
  `reverse_proxy_host` varchar(50) DEFAULT NULL,
  `is_ssl` tinyint(2) DEFAULT NULL,
  `staging_ci_url` varchar(255) DEFAULT NULL,
  `production_ci_url` varchar(255) DEFAULT NULL,
  `staging_server_manage_url` varchar(255) DEFAULT NULL,
  `production_server_manage_url` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20170620090815, 'Initial', '2017-06-20 03:08:15', '2017-06-20 03:08:15', 0),
(20170807061442, 'Initial', '2017-08-07 00:14:43', '2017-08-07 00:14:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `alias`, `name`, `description`, `created`, `modified`) VALUES
(1, 'director', 'Director', 'AW Directors', '2017-06-16 09:58:23', '2017-06-16 09:58:23'),
(2, 'developers', 'Developer', 'Reivo Developers', '2017-06-16 09:58:23', '2017-06-16 09:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `media_request_id` int(11) NOT NULL,
  `task_type_id` int(11) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `backlog_progress_url` varchar(255) DEFAULT NULL,
  `chatwork_progress_url` varchar(255) DEFAULT NULL,
  `state` tinyint(4) DEFAULT '1',
  `requirements` varchar(255) DEFAULT NULL,
  `dependencies` text,
  `artifacts` text,
  `isactive` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks_users`
--

CREATE TABLE `tasks_users` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks_users`
--

INSERT INTO `tasks_users` (`id`, `task_id`, `user_id`, `assigned_by`, `modified`, `created`) VALUES
(1, 3, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE `task_types` (
  `id` int(11) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `templete` varchar(500) DEFAULT NULL,
  `backlog_projectid` varchar(100) DEFAULT NULL,
  `backlog_priorityid` varchar(100) DEFAULT NULL,
  `backlog_issue_typeid` varchar(100) DEFAULT NULL,
  `backlog_assignee_key` varchar(255) DEFAULT NULL,
  `backlog_notify_ids` varchar(255) DEFAULT NULL,
  `chatwork_assignee_key` varchar(255) DEFAULT NULL,
  `chatwork_notify_ids` varchar(100) DEFAULT NULL,
  `dependencies` text,
  `artifacts` text,
  `isactive` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`id`, `alias`, `name`, `templete`, `backlog_projectid`, `backlog_priorityid`, `backlog_issue_typeid`, `backlog_assignee_key`, `backlog_notify_ids`, `chatwork_assignee_key`, `chatwork_notify_ids`, `dependencies`, `artifacts`, `isactive`, `isdel`, `modified_by`, `created_by`, `modified`, `created`) VALUES
(1, 'appid', 'Create Appid', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '2470772,2471111', '', 'appid,console_account', 1, NULL, NULL, NULL, '2017-08-28 08:47:52', '2017-07-26 04:53:51'),
(2, 'create-ci', 'Create CI', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', 'staging_domain,ecs_cluster_name_dev,ecs_cluster_ip_dev', 'staging_ci_url,production_ci_url', 1, NULL, NULL, NULL, '2017-08-28 08:48:14', '2017-07-26 04:54:52'),
(3, 'apikey-server', 'Create Server Apikey', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', 'appid', 'apikey_dev,apikey_browser_dev', 1, NULL, NULL, NULL, '2017-08-28 08:48:42', '2017-07-26 04:55:39'),
(4, 'apikey-browser', 'Create browser Apikey', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', 'appid', 'apikey_prd,apikey_browser_prd', 1, NULL, NULL, NULL, '2017-08-28 08:49:00', '2017-07-26 04:56:13'),
(5, 'production-server', 'Create Production Server', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', '', 'apikey_dev,apikey_prd', 1, NULL, NULL, NULL, '2017-08-28 08:50:32', '2017-07-26 04:56:43'),
(6, 'reverse-proxy', 'Add Reverse Proxy', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', 'staging_domain,ecs_cluster_ip_dev', 'reverse_proxy_host', 1, NULL, NULL, NULL, '2017-08-28 08:50:51', '2017-07-26 04:57:19'),
(7, 'enable-ssl', 'Eenable SSL', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', '', 'is_ssl', 1, NULL, NULL, NULL, '2017-08-28 08:51:16', '2017-07-26 04:57:51'),
(8, 'staging-server', 'Create Staging Server', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', '', 'ecs_cluster_name_dev,ecs_cluster_ip_dev,staging_server_manage_url', 1, NULL, NULL, NULL, '2017-08-28 08:51:48', '2017-07-26 04:58:19'),
(9, 'staging-domain', 'Register Staging domain', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', 'staging_domain,ecs_cluster_name_dev,ecs_cluster_ip_dev', 'staging_domain', 1, NULL, NULL, NULL, '2017-08-28 08:52:07', '2017-07-26 04:58:47'),
(10, 'enable-crossmedia', 'Enable Crossmedia', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', '', 'apikey_prd', 1, NULL, NULL, NULL, '2017-08-28 08:52:38', '2017-07-26 04:59:24'),
(11, 'ranking', 'Enable ranking', 'This appid is `{MEDIA-MOOD}` and Media scope is `{MEDIA-SCOPE}` testing `{RELEASE-DOMAINS}`', '1073868649', '3', '1074328886', '1074087102', '1074087100,1074087101,1074087102', '80356142', '', '', 'apikey_prd', 1, NULL, NULL, NULL, '2017-08-28 08:52:52', '2017-07-26 04:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `backlogid` varchar(255) DEFAULT NULL,
  `chatworkid` varchar(255) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `backlogid`, `chatworkid`, `isactive`, `isdel`, `modified_by`, `created_by`, `modified`, `created`) VALUES
(1, 1, 'Reivo Director', 'director1@reivo.co.jp', '$2y$10$BZnSPR7n7y9Hs064AhNDpOBwuoDa9U9.ebCf4zlB3dFGaub0G4/ey', '', '', 1, NULL, NULL, NULL, '2017-06-20 08:29:59', '2017-06-19 04:56:54'),
(2, 2, 'Developer 1', 'dev1@reivo.co.jp', '$2y$10$AAtI48FachIZtIZNbpoX9OA7n1CER/k2Dnsk0T8BpTepeOJ/O4uoi', '', '', 1, NULL, NULL, NULL, '2017-06-20 08:33:43', '2017-06-20 08:30:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_requests`
--
ALTER TABLE `media_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_sysinfo`
--
ALTER TABLE `media_sysinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_users`
--
ALTER TABLE `tasks_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_types`
--
ALTER TABLE `task_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media_requests`
--
ALTER TABLE `media_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `media_sysinfo`
--
ALTER TABLE `media_sysinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks_users`
--
ALTER TABLE `tasks_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `task_types`
--
ALTER TABLE `task_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

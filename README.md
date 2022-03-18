# Rudolph-Tables-Calculator
The Rudolph table is a table published each year by Prof. Klaus Rudolph for age-appropriate performance evaluation in swimming.

- [0]     Beginner
- [0-5]   Intermediate
- [5-10]  Local level
- [10-15] Regional level
- [15-20] National level
  - [17-18] National Peak
  - [19] Top of the world
  - [20] World level or WR record

```SQL
CREATE TABLE `rudolphScore` (
  `year` year(4) NOT NULL,
  `point` int(11) NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `event` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `result` time(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

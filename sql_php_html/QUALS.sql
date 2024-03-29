INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('1', 'SEC-45', 'Secretarial work; candidate must type at least 45 words per minute');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('2', 'SEC-60', 'Secretarial work; candidate must type at least 60 words per minute');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('3', 'CLERK', 'General clerking work');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('4', 'PRG-PY', 'Programmer, Python');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('5', 'PRG-C++', 'Programmer, C++');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('6', 'DBA-ORA', 'Database Administrator, Oracle');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('7', 'DBA-DB2', 'Database Administrator, IBM DB2');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('8', 'DBA-SQLSERV', 'Database Administrator, MS SQL Server');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('9', 'SYS-1', 'Systems Analyst, level 1');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('10', 'SYS-2', 'Systems Analyst, level 2');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('11', 'NW-CIS', 'Network Administrator, Cisco experience');
INSERT INTO QUALIFICATIONS (QUALIFICATION_ID, QUALIFICATION_CODE, QUALIFICATION_DESC) VALUES ('12', 'WD-CF', 'Web Developer, ColdFusion');



INSERT INTO qualification_status (QUALIFICATION_ID, CANDIDATE_ID) VALUES ((SELECT QUALIFICATION_ID FROM qualifications WHERE QUALIFICATION_ID = '9'), (SELECT CANDIDATE_ID FROM candidate));

=================================================================================================================
/*statement for php interface file*/

SELECT JH.START_DATE AS 'Start Date', JH.END_DATE AS 'End Date', C.FIRST_NAME AS 'First Name', C.LAST_NAME AS 'Last Name', Q.QUALIFICATION_DESC AS 'Qualification'
FROM JOB_HISTORY AS JH
LEFT JOIN CANDIDATE AS C ON JH.CANDIDATE_ID = C.CANDIDATE_ID
LEFT JOIN QUALIFICATION_STATUS AS QS ON QS.CANDIDATE_ID = JH.CANDIDATE_ID
LEFT JOIN QUALIFICATIONS AS Q ON Q.QUALIFICATION_ID = QS.QUALIFICATION_ID;

=================================================================================================================
/*statements to fill out qualifications table*/

INSERT INTO candidate (QUALIFICATION_ID, CANDIDATE_ID) VALUES ('1', 'Patrick', 'Kane');

=================================================================================================================
/*statements to fill out candidate table*/

INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('1', 'Patrick', 'Kane');
INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('2', 'Dylan', 'Larkin');
INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('3', 'Moritz', 'Seider');
INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('4', 'Lucas', 'Raymond');
INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('5', 'Daniel', 'Sprong');
INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('6', 'Alex', 'Lyon');
INSERT INTO candidate (CANDIDATE_ID, FIRST_NAME, LAST_NAME) VALUES ('7', 'JT', 'Compher');
  
=================================================================================================================
/*statements to fill out opening table*/

INSERT INTO opening 
VALUES (1, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 1), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 1), '2023-02-15', '2024-06-07', 23.15);

INSERT INTO opening 
VALUES (2, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 2), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 2), '2023-03-15', '2023-03-15', 30.15);

INSERT INTO opening 
VALUES (3, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 3), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 3), '2023-01-15', '2024-09-07', 26.05);

INSERT INTO opening 
VALUES (4, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 4), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 4), '2023-06-15', '2024-02-07', 40.00);

INSERT INTO opening 
VALUES (5, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 5), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 5), '2023-02-22', '2024-06-26', 45.23);

INSERT INTO opening 
VALUES (6, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 6), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 6), '2023-07-15', '2024-07-07', 23.35);

INSERT INTO opening 
VALUES (7, (SELECT COMPANY_ID FROM COMPANY WHERE COMPANY_ID = 7), 
(SELECT QUALIFICATION_ID FROM QUALIFICATIONS WHERE QUALIFICATION_ID = 7), '2023-04-15', '2024-03-07', 32.15);

=================================================================================================================
*Sql statements to fill out company table*

INSERT INTO COMPANY
VALUES (1, 'Facebook');

INSERT INTO COMPANY
VALUES (2, 'Google');

INSERT INTO COMPANY
VALUES (3, 'Walmart');

INSERT INTO COMPANY
VALUES (4, 'Microsoft');

INSERT INTO COMPANY
VALUES (5, 'Apple');

INSERT INTO COMPANY
VALUES (6, 'UPS');

INSERT INTO COMPANY
VALUES (7, 'FedEx');

=================================================================================================================
/*Sql statements to fill out job_history table*/

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 1), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 1), '2017-02-15', '2018-06-07');

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 2), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 2), '2016-03-15', '2018-06-09');

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 3), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 3), '2017-02-15', '2019-05-07');

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 4), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 4), '2017-06-15', '2018-03-07');

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 5), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 5), '2017-02-25', '2018-08-08');

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 6), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 6), '2017-02-07', '2018-04-04');

INSERT INTO job_history 
VALUES ((SELECT OPENING_ID FROM opening WHERE OPENING_ID = 7), 
(SELECT CANDIDATE_ID FROM candidate WHERE CANDIDATE_ID = 7), '2017-01-15', '2018-02-07');

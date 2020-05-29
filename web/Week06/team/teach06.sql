CREATE TABLE topic (
  topic_id SERIAL PRIMARY key,
  name varchar(30) NOT NULL 
);

INSERT INTO topic (name) VALUES
('Faith'),
('Sacrafice'),
('Charity');
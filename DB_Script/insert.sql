-- 'Sex' Table Initialization
INSERT INTO Sex(type) VALUES('female')
INSERT INTO Sex(type) VALUES('male')

-- 'Category' Table Initialization
INSERT INTO Category(name) VALUES('대상포진');
INSERT INTO Category(name) VALUES('사람유두종바이러스 감염증 (자궁경부암)');
INSERT INTO Category(name) VALUES('수막구균');
INSERT INTO Category(name) VALUES('신증후군출혈열 (한타 바이러스)');
INSERT INTO Category(name) VALUES('수두');
INSERT INTO Category(name) VALUES('로타바이러스');
INSERT INTO Category(name) VALUES('일본뇌염');
INSERT INTO Category(name) VALUES('장티푸스');
INSERT INTO Category(name) VALUES('파상풍+디프테리아');
INSERT INTO Category(name) VALUES('파상풍+디프테리아+백일해');
INSERT INTO Category(name) VALUES('폐렴구균 (폐렴)');
INSERT INTO Category(name) VALUES('홍역+유행성이하선염+풍진 (풍진, 볼거리, 홍역');
INSERT INTO Category(name) VALUES('A형간염_소아용/성인용');
INSERT INTO Category(name) VALUES('B형간염_소아용/성인용');
INSERT INTO Category(name) VALUES('b형헤모필루스인풀루엔자 (뇌수막염)');

-- 'Vaccine' Table Initialization
INSERT INTO Vaccine(name, CategoryId) VALUES('대상포진 예방접종 (스카이조스터주)', 1);
INSERT INTO Vaccine(name, CategoryId) VALUES('대상포진 예방접종 (조스타박스주)', 1);

INSERT INTO Vaccine(name, CategoryId) VALUES('자궁경부암 예방접종 (서바릭스프리필드시린지)', 2);
INSERT INTO Vaccine(name, CategoryId) VALUES('자궁경부암 예방접종 (가다실 프리필드시린지)', 2);
INSERT INTO Vaccine(name, CategoryId) VALUES('자궁경부암 예방접종 (가다실9프리필드시린지)', 2);
INSERT INTO Vaccine(name, CategoryId) VALUES('자궁경부암 예방접종 (가다실 주)', 2);
INSERT INTO Vaccine(name, CategoryId) VALUES('자궁경부암 예방접종 (가다실9주)', 2);

INSERT INTO Vaccine(name, CategoryId) VALUES('수막구균 예방접종 (멘비오)', 3);
INSERT INTO Vaccine(name, CategoryId) VALUES('수막구균 예방접종 (메낙트라주)', 3);

INSERT INTO Vaccine(name, CategoryId) VALUES('한타 바이러스 예방접종 (한타박스주 0.5mL)', 4);

INSERT INTO Vaccine(name, CategoryId) VALUES('수두 예방접종 (바리-엘백신)', 5);
INSERT INTO Vaccine(name, CategoryId) VALUES('수두 예방접종 (스카이바리셀라주)', 5);
INSERT INTO Vaccine(name, CategoryId) VALUES('수두 예방접종 (수두박스주)', 5);

INSERT INTO Vaccine(name, CategoryId) VALUES('로타바이러스 예방접종 (로타릭스)', 6);
INSERT INTO Vaccine(name, CategoryId) VALUES('로타바이러스 예방접종 (로타릭스 액)', 6);
INSERT INTO Vaccine(name, CategoryId) VALUES('로타바이러스 예방접종 (로타릭스프리필드)', 6);
INSERT INTO Vaccine(name, CategoryId) VALUES('로타바이러스 예방접종 (로타텍액)', 6);

INSERT INTO Vaccine(name, CategoryId) VALUES('일본뇌염 예방접종 (녹십자-세포배양일본뇌염백신주 0.4mL)', 7);
INSERT INTO Vaccine(name, CategoryId) VALUES('일본뇌염 예방접종 (녹십자-세포배양일본뇌염백신주 0.7mL)', 7);
INSERT INTO Vaccine(name, CategoryId) VALUES('일본뇌염 예방접종 (보령세포배양일본뇌염백신주 0.4mL)', 7);
INSERT INTO Vaccine(name, CategoryId) VALUES('일본뇌염 예방접종 (보령세포배양일본뇌염백신주 0.7mL)', 7);
INSERT INTO Vaccine(name, CategoryId) VALUES('일본뇌염 예방접종 (씨디제박스)', 7);

INSERT INTO Vaccine(name, CategoryId) VALUES('장티푸스 예방접종 (지로티프-주)', 8);

INSERT INTO Vaccine(name, CategoryId) VALUES('파상풍+디프테리아 예방접종 (에스케이티디백신주)', 9);
INSERT INTO Vaccine(name, CategoryId) VALUES('파상풍+디프테리아 예방접종 (녹십자티디백신프리필드시린지주)', 9);
INSERT INTO Vaccine(name, CategoryId) VALUES('파상풍+디프테리아 예방접종 (티디퓨어주)', 9);
INSERT INTO Vaccine(name, CategoryId) VALUES('파상풍+디프테리아 예방접종 (디티부스터주)', 9);

INSERT INTO Vaccine(name, CategoryId) VALUES('파상풍+디프테리아+백일해 예방접종 (부스트릭스프리필드시린지)', 10);
INSERT INTO Vaccine(name, CategoryId) VALUES('파상풍+디프테리아+백일해 예방접종 (아다셀주)', 10);

INSERT INTO Vaccine(name, CategoryId) VALUES('폐렴 예방접종 (프리베나13주)', 11);
INSERT INTO Vaccine(name, CategoryId) VALUES('폐렴 예방접종 (신플로릭스프리필드시린지)', 11);
INSERT INTO Vaccine(name, CategoryId) VALUES('폐렴 예방접종 (프로디악스-23)', 11);
INSERT INTO Vaccine(name, CategoryId) VALUES('폐렴 예방접종 (프로디악스-23프리필드시린지)', 11);

INSERT INTO Vaccine(name, CategoryId) VALUES('풍진+유행성이하선염+홍역 예방접종 (MMR2)', 12);
INSERT INTO Vaccine(name, CategoryId) VALUES('풍진+유행성이하선염+홍역 예방접종 (프리오릭스주)', 12);

INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_소아용 (하브릭스주 0.5mL)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_성인용 (하브릭스주 1.0mL)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_소아용 (박타주 0.5mL)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_성인용 (박타주 1.0mL)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_소아용 (박타프리필드 시린지 0.5mL)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_성인용 (박타프리필드 시린지 1.0mL)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_소아용 (아박심80U소아용주)', 13);
INSERT INTO Vaccine(name, CategoryId) VALUES('A형간염 예방접종_성인용 (아박심80U성인용주)', 13);

INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_소아용 (헤파박스-진티에프주 0.5mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_성인용 (헤파박스-진티에프주 1.0mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_성인용 (헤파박스-진티에프프리필드시린지주 1.0mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_소아용 (헤파뮨주 0.5mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_성인용 (헤파뮨프리필드시린지 1.0mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_소아용 (유박스비주 0.5mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_성인용 (유박스비주 1.0mL)', 14);
INSERT INTO Vaccine(name, CategoryId) VALUES('B형간염 예방접종_성인용 (유박스비프리필드주 0.5mL)', 14);

INSERT INTO Vaccine(name, CategoryId) VALUES('뇌수막염 예방접종 (유히브주)', 15);
-- 'Hospital' Table Initialization

-- 'Price' Table Initialization

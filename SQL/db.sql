-- RESETING TABLES
DROP TABLE IF EXISTS public."user" CASCADE;
DROP TABLE IF EXISTS public."gig" CASCADE;
DROP TABLE IF EXISTS public."msg" CASCADE;
DROP TABLE IF EXISTS public."buy" CASCADE;
-- CREATING TABLES
CREATE TABLE public."user" (
    id_user int NULL,
    "name" varchar NULL,
    "password" varchar NULL,
    wallet NUMERIC(15, 2),
    PRIMARY KEY(id_user)
);
CREATE TABLE public."gig" (
    id_gig INT,
    price NUMERIC(6, 2) NOT NULL,
    description_gig VARCHAR(240),
    category_gig VARCHAR(30),
    id_user INT NOT NULL,
    PRIMARY KEY(id_gig),
    CONSTRAINT fk_user_gig FOREIGN KEY(id_user) REFERENCES public."user"(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE public."buy"(
    id_gig INT,
    id_user INT,
    timestamp_buy timestamp NOT NULL,
    rating_buy INT,
    UNIQUE(timestamp_buy),
    PRIMARY KEY(id_gig, id_user, timestamp_buy),
    FOREIGN KEY(id_user) REFERENCES public."user"(id_user),
    CONSTRAINT fk_user_buy FOREIGN KEY(id_user) REFERENCES public."user"(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_gig_buy FOREIGN KEY(id_gig) REFERENCES public."gig"(id_gig) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE public."msg"(
    sender INT,
    receiver INT,
    id_message INT NOT NULL,
    timestamp_message timestamp NOT NULL,
    content_msg VARCHAR(240),
    UNIQUE(id_message),
    PRIMARY KEY(sender, receiver, id_message),
    CONSTRAINT fk_sender_message FOREIGN KEY(sender) REFERENCES public."user"(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_receiver_message FOREIGN KEY(receiver) REFERENCES public."user"(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);
-- INSERTING DATA
INSERT INTO public."user"(id_user, "name", password, wallet)
VALUES (1, 'Fabiii', 'bg', 1000),
    (2, 'Kevin', 'bg', 100),
    (3, 'Steven', 'bg', 500),
    (4, 'Bébou', 'Jean-Seb', 10000),
    (5, 'Pablito', 'ilovesnow', 10);
INSERT INTO public."gig"(
        id_gig,
        price,
        description_gig,
        category_gig,
        id_user
    )
VALUES (
        1,
        100,
        'I will implement a given UI in a web page using the 3DS library.',
        'DEV-FRONT',
        2
    ),
    (
        2,
        120,
        'I will design a UI of different size based on specification.',
        'DATABASE',
        4
    ),
    (
        3,
        500,
        'I will provide high value coaching on conflict solving and team leadership.',
        'MANAGEMENT',
        5
    );
INSERT INTO public."buy"(id_gig, id_user, rating_buy, timestamp_buy)
VALUES (2, 1, 7.5, '2021-04-1 10:00:00'),
    (2, 1, 10, '2021-04-3 10:00:00'),
    (3, 3, 8, '2021-04-1 12:00:00');
INSERT INTO public."msg"(
        sender,
        receiver,
        id_message,
        timestamp_message,
        content_msg
    )
VALUES (
        1,
        4,
        1,
        '2021-04-2 10:00:00',
        'Hello I really appreciated your last work you mind doing another similar gig only for mobile this time ?'
    ),
    (
        4,
        1,
        2,
        '2021-04-2 14:00:00',
        'Hello, happy you liked my work, and yes I also do mobile UI on the same gig just book it like last time.'
    ),
    (
        2,
        5,
        3,
        '2021-03-25 14:00:00',
        'Hello, are you available for a long session not like the one in your existing gigs ?'
    );
# FROM означает с каком образом будет использовать
# на основу чего будем создавать свой контейнер
FROM node:12-alpine



# WORKDIR (Указываем наша текущая папка с которой работаем )
WORKDIR /app



# COPY ( Означает мы скопируем все содержимое из текущей папки в оброзе node:12-alpine )
COPY .. .


# RUN ( Запускаем команды например composer )
RUN  yarn install --production


# CMD ( Запусти "node" в src/index.js как например "php public/index.php" )
CMD ["node", "src/index.js"]
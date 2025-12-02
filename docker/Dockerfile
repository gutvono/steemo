FROM mysql:8.0

# Variáveis padrão do banco
ENV MYSQL_DATABASE=steemo_db
ENV MYSQL_USER=steemo_user
ENV MYSQL_PASSWORD=steemo_pass
ENV MYSQL_ROOT_PASSWORD=root

# Copiar scripts SQL do projeto para dentro do container em /scripts
# (init.sql: cria DB/tabela | seed.sql: popula usuários de teste)
COPY scripts/init.sql /scripts/init.sql
COPY scripts/seed.sql /scripts/seed.sql

# Ajustar permissões e disponibilizar no PATH via symlink
RUN chmod 644 /scripts/init.sql /scripts/seed.sql \
    && ln -sf /scripts/init.sql /usr/local/bin/init.sql \
    && ln -sf /scripts/seed.sql /usr/local/bin/seed.sql

# Garantir que /usr/local/bin esteja no PATH
ENV PATH="/usr/local/bin:${PATH}"

EXPOSE 3306

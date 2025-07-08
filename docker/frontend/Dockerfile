FROM debian:bookworm-slim

RUN apt-get update && apt-get install -y curl build-essential

ENV NVM_DIR=/root/.nvm
ENV NODE_VERSION=22.17.0
# Instala nvm

# Instala o NVM
ENV NVM_DIR=/root/.nvm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash \
    && . "$NVM_DIR/nvm.sh" \
    && nvm install --lts \
    && nvm use --lts \
    && nvm alias default 'lts/*' \
    && npm install -g npm

# Adiciona nvm ao PATH para sessões interativas
RUN echo "export NVM_DIR=\"$NVM_DIR\"" >> /root/.bashrc \
    && echo "[ -s \"$NVM_DIR/nvm.sh\" ] && \. \"$NVM_DIR/nvm.sh\"" >> /root/.bashrc



# Instala Node 22 (última disponível da série 22)
RUN bash -c "source $NVM_DIR/nvm.sh && nvm install "${NODE_VERSION}" && nvm use "${NODE_VERSION}" && nvm alias default "${NODE_VERSION}""

# Ajusta PATH para encontrar node e npm
ENV PATH=$NVM_DIR/versions/node/v${NODE_VERSION}/bin:$PATH

# Verifica versão instalada
RUN bash -c "source $NVM_DIR/nvm.sh && node -v && npm -v"

# Instala Angular CLI global
RUN bash -c "source $NVM_DIR/nvm.sh && npm install -g @angular/cli@latest"

WORKDIR /workspace

EXPOSE 4200

CMD ["bash"]
